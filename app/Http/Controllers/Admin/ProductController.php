<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        $categories = Category::all();
        return view('produk.index', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'satuan' => 'required',
            'harga_jual' => 'required|numeric|min:0',
        ]);

        Product::create($request->only('nama', 'category_id', 'satuan', 'harga_jual'));

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, Product $produk)
    {
        $request->validate([
            'nama' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'satuan' => 'required',
            'harga_jual' => 'required|numeric|min:0',
        ]);

        $produk->update($request->only('nama', 'category_id', 'satuan', 'harga_jual'));

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
