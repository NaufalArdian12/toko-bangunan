@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-10">
    <h2 class="text-xl font-bold mb-4">Edit Stok Barang</h2>

    <form action="{{ route('stok.update', $stockItem->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Produk</label>
            <input type="text" disabled value="{{ $stockItem->product->nama }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-medium">Gudang</label>
            <input type="text" disabled value="{{ $stockItem->warehouse->nama }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-medium">Jumlah</label>
            <input type="number" name="jumlah" value="{{ $stockItem->jumlah }}" class="w-full border p-2 rounded" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
