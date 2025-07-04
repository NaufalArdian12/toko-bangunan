<?php
namespace App\Http\Controllers\Admin;

use App\Models\Product;
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
        $products = Product::all();
        $warehouses = Warehouse::all();
        return view('transaksi.create', compact('products', 'warehouses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'nullable|string',
            'metode_pembayaran' => 'required|in:cash,transfer,qris',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.warehouse_id' => 'required|exists:warehouses,id',
            'items.*.jumlah' => 'required|integer|min:1',
            'items.*.harga_satuan' => 'required|integer|min:0',
        ]);

        $potongan = $request->potongan ?? 0;

        // Hitung total
        $total = 0;
        foreach ($request->items as $item) {
            $total += $item['jumlah'] * $item['harga_satuan'];
        }
        $total -= $potongan;

        // Simpan transaksi
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'nama_pelanggan' => $request->nama_pelanggan,
            'metode_pembayaran' => $request->metode_pembayaran,
            'potongan' => $potongan,
            'total' => $total,
        ]);

        // Simpan item
        foreach ($request->items as $item) {
            TransactionItem::create([
                'transaction_id' => $transaction->id,
                'product_id' => $item['product_id'],
                'warehouse_id' => $item['warehouse_id'],
                'jumlah' => $item['jumlah'],
                'harga_satuan' => $item['harga_satuan'],
                'subtotal' => $item['jumlah'] * $item['harga_satuan'],
            ]);
        }

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan.');
    }
}

