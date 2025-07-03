<?php

namespace App\Http\Controllers;

use App\Models\StockItem;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $warehouses = Warehouse::all();
        $stockItems = StockItem::with(['product', 'warehouse'])->get();
        return view('stok.index', compact('products', 'warehouses', 'stockItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $stok = StockItem::firstOrNew([
            'product_id' => $request->product_id,
            'warehouse_id' => $request->warehouse_id,
        ]);

        $stok->jumlah += $request->jumlah;
        $stok->save();

        return redirect()->route('stok.index')->with('success', 'Stok berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $stockItem = StockItem::findOrFail($id);
        return view('stok.edit', compact('stockItem'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:0',
            'warehouse_id' => 'required|exists:warehouses,id',
        ]);

        $stockItem = StockItem::findOrFail($id);
        $stockItem->jumlah = $request->jumlah;
        $stockItem->warehouse_id = $request->warehouse_id;
        $stockItem->save();

        return redirect()->route('stok.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $stockItem = StockItem::findOrFail($id);
        $stockItem->delete();

        return redirect()->route('stok.index')->with('success', 'Stok berhasil dihapus!');
    }
}

