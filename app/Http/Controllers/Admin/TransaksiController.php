<?php
namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\StockItem;
use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('items.product', 'items.warehouse')->latest()->get();
        return view('transaksi.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::whereIn('id', function ($query) {
            $query->select('product_id')
                ->from('stock_items')
                ->where('jumlah', '>', 0);
        })->get();
        $warehouses = Warehouse::all();
        return view('transaksi.create', compact('products', 'warehouses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'nullable|string|max:255',
            'metode_pembayaran' => 'required|in:tunai,transfer,qris',
            'potongan' => 'nullable|numeric|min:0',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.warehouse_id' => 'required|exists:warehouses,id',
            'items.*.jumlah' => 'required|integer|min:1',
        ]);

        // Hitung total dan validasi stok
        $total = 0;
        $itemsData = [];

        foreach ($request->items as $item) {
            $stok = StockItem::where('product_id', $item['product_id'])
                ->where('warehouse_id', $item['warehouse_id'])
                ->first();

            if (!$stok) {
                return back()->withErrors([
                    'items' => 'Gudang yang dipilih tidak menyimpan stok produk yang sesuai.'
                ])->withInput();
            }

            if ($stok->jumlah < $item['jumlah']) {
                return back()->withErrors([
                    'items' => 'Stok produk "' . $stok->product->nama . '" di gudang "' . $stok->warehouse->nama . '" tidak mencukupi.'
                ])->withInput();
            }

            $harga = Product::findOrFail($item['product_id'])->harga_jual;
            $subtotal = $harga * $item['jumlah'];

            $itemsData[] = [
                'product_id' => $item['product_id'],
                'warehouse_id' => $item['warehouse_id'],
                'jumlah' => $item['jumlah'],
                'harga_satuan' => $harga,
                'subtotal' => $subtotal,
            ];

            $total += $subtotal;
        }

        $potongan = $request->potongan ?? 0;
        $totalFinal = max($total - $potongan, 0);

        // ✅ Buat transaksi dulu
        $transaksi = Transaction::create([
            'user_id' => Auth::id(),
            'nama_pelanggan' => $request->nama_pelanggan,
            'metode_pembayaran' => $request->metode_pembayaran,
            'potongan' => $potongan,
            'total' => $totalFinal,
        ]);

        // ✅ Simpan item dan kurangi stok
        foreach ($itemsData as $item) {
            $item['transaction_id'] = $transaksi->id;
            TransactionItem::create($item);

            $stok = StockItem::where('product_id', $item['product_id'])
                ->where('warehouse_id', $item['warehouse_id'])
                ->first();

            if ($stok) {
                $stok->jumlah = max($stok->jumlah - $item['jumlah'], 0);
                $stok->save();
            }
        }

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan.');
    }

    public function destroy($id)
    {
        $transaksi = Transaction::with('items')->findOrFail($id);

        foreach ($transaksi->items as $item) {
            // ✅ Tambahkan kembali stok
            $stok = StockItem::where('product_id', $item->product_id)
                ->where('warehouse_id', $item->warehouse_id)
                ->first();

            if ($stok) {
                $stok->jumlah += $item->jumlah;
                $stok->save();
            }

            // ❌ Hapus item transaksi
            $item->delete();
        }

        // ❌ Hapus transaksi utama
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus dan stok dikembalikan.');
    }


}

