@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Manajemen Produk</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah Produk -->
    <button onclick="document.getElementById('modal-create').classList.remove('hidden')"
        class="bg-blue-600 text-white px-4 py-2 rounded mb-4">
        + Tambah Produk
    </button>

    <!-- Tabel Produk -->
    <div class="bg-white rounded shadow p-4">
        <table class="w-full table-auto text-sm border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Kategori</th>
                    <th class="px-4 py-2 border">Satuan</th>
                    <th class="px-4 py-2 border">Harga Jual</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $produk)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $produk->nama }}</td>
                        <td class="px-4 py-2">{{ $produk->category->nama ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $produk->satuan }}</td>
                        <td class="px-4 py-2">Rp{{ number_format($produk->harga_jual, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <button onclick="openEditModal({{ $produk->id }}, '{{ $produk->nama }}', '{{ $produk->category_id }}', '{{ $produk->satuan }}', '{{ $produk->harga_jual }}')"
                                class="text-blue-600 hover:underline">Edit</button>

                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-3">Belum ada produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Create -->
<div id="modal-create" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-6 w-full max-w-lg rounded relative">
        <button onclick="document.getElementById('modal-create').classList.add('hidden')" class="absolute top-2 right-3 text-xl text-gray-400 hover:text-gray-600">&times;</button>
        <h3 class="text-lg font-semibold mb-4">Tambah Produk</h3>

        <form action="{{ route('produk.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium">Nama Produk</label>
                <input type="text" name="nama" required class="w-full p-2 border rounded">
            </div>
            <div>
                <label class="block text-sm font-medium">Kategori</label>
                <select name="category_id" class="w-full p-2 border rounded">
                    @foreach($categories as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium">Satuan</label>
                <input type="text" name="satuan" required class="w-full p-2 border rounded">
            </div>
            <div>
                <label class="block text-sm font-medium">Harga Jual</label>
                <input type="number" name="harga_jual" required class="w-full p-2 border rounded">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="modal-edit" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-6 w-full max-w-lg rounded relative">
        <button onclick="document.getElementById('modal-edit').classList.add('hidden')" class="absolute top-2 right-3 text-xl text-gray-400 hover:text-gray-600">&times;</button>
        <h3 class="text-lg font-semibold mb-4">Edit Produk</h3>

        <form method="POST" id="form-edit" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium">Nama Produk</label>
                <input type="text" name="nama" id="edit-nama" required class="w-full p-2 border rounded">
            </div>
            <div>
                <label class="block text-sm font-medium">Kategori</label>
                <select name="category_id" id="edit-kategori" class="w-full p-2 border rounded">
                    @foreach($categories as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium">Satuan</label>
                <input type="text" name="satuan" id="edit-satuan" required class="w-full p-2 border rounded">
            </div>
            <div>
                <label class="block text-sm font-medium">Harga Jual</label>
                <input type="number" name="harga_jual" id="edit-harga" required class="w-full p-2 border rounded">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(id, nama, categoryId, satuan, hargaJual) {
        document.getElementById('edit-nama').value = nama;
        document.getElementById('edit-satuan').value = satuan;
        document.getElementById('edit-harga').value = hargaJual;
        document.getElementById('edit-kategori').value = categoryId;
        document.getElementById('form-edit').action = `/produk/${id}`;
        document.getElementById('modal-edit').classList.remove('hidden');
    }
</script>
@endsection
