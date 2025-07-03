@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-xl font-bold mb-4">Tambah Stok Barang</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('stok.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="product_id" class="block font-medium">Produk</label>
            <select name="product_id" id="product_id" class="w-full border p-2 rounded">
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="warehouse_id" class="block font-medium">Gudang</label>
            <select name="warehouse_id" id="warehouse_id" class="w-full border p-2 rounded">
                @foreach($warehouses as $warehouse)
                    <option value="{{ $warehouse->id }}">{{ $warehouse->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="jumlah" class="block font-medium">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="w-full border p-2 rounded" required min="1">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Stok</button>
    </form>
</div>
@endsection
