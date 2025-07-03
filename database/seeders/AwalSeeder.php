<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Warehouse;
use App\Models\Product;

class AwalSeeder extends Seeder
{
    public function run(): void
    {
        // Kategori
        $barangJadi = Category::create(['nama' => 'Barang Jadi']);
        $barangMentah = Category::create(['nama' => 'Barang Belum Jadi']);

        // Gudang
        $gudangA = Warehouse::create(['nama' => 'Gudang A']);
        $gudangB = Warehouse::create(['nama' => 'Gudang B']);

        // Produk
        Product::create([
            'nama' => 'Semen Gresik',
            'category_id' => $barangMentah->id,
            'satuan' => 'sak',
            'harga_jual' => 65000
        ]);

        Product::create([
            'nama' => 'Batu Bata Merah',
            'category_id' => $barangJadi->id,
            'satuan' => 'biji',
            'harga_jual' => 750
        ]);

        Product::create([
            'nama' => 'Pasir Urug',
            'category_id' => $barangMentah->id,
            'satuan' => 'm³',
            'harga_jual' => 120000
        ]);
    }
}

