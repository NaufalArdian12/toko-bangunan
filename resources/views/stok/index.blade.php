@extends('layouts.app')

@section('content')

    <div class="max-w-4xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Manajemen Stok Barang</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <button onclick="document.getElementById('modal-stok').classList.remove('hidden')"
            class="bg-blue-600 text-white px-4 py-2 rounded mb-4">
            + Tambah Stok
        </button>


        <!-- TABEL STOK -->
        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-lg font-semibold mb-4">Daftar Stok Gudang</h3>

            <table class="min-w-full table-auto text-sm border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">Produk</th>
                        <th class="px-4 py-2 border">Gudang</th>
                        <th class="px-4 py-2 border">Jumlah</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stockItems as $stok)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $stok->product->nama }}</td>
                            <td class="px-4 py-2">{{ $stok->warehouse->nama }}</td>
                            <td class="px-4 py-2">{{ $stok->jumlah }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="#"
                                    onclick="openEditModal({{ $stok->id }}, '{{ $stok->product->nama }}', '{{ $stok->warehouse->nama }}', {{ $stok->jumlah }}, {{ $stok->warehouse_id }})"
                                    class="text-blue-600 hover:underline">
                                    Edit
                                </a>
                                <form action="{{ route('stok.destroy', $stok->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Yakin ingin menghapus stok ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center px-4 py-3 text-gray-500">Belum ada data stok</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal-stok" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
        <div class="bg-white w-full max-w-lg rounded-lg shadow-lg p-6 relative">
            <!-- Tombol close -->
            <button onclick="document.getElementById('modal-stok').classList.add('hidden')"
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl">&times;</button>

            <h3 class="text-lg font-semibold mb-4">Tambah Stok Barang</h3>

            <form action="{{ route('stok.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="product_id" class="block font-medium text-sm">Produk</label>
                    <select name="product_id" id="product_id" class="w-full border-gray-300 rounded p-2">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="warehouse_id" class="block font-medium text-sm">Gudang</label>
                    <select name="warehouse_id" id="warehouse_id" class="w-full border-gray-300 rounded p-2">
                        @foreach($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}">{{ $warehouse->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="jumlah" class="block font-medium text-sm">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" min="1" required
                        class="w-full border-gray-300 rounded p-2" />
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="modal-edit-stok" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
        <div class="bg-white w-full max-w-lg rounded-lg shadow-lg p-6 relative">
            <!-- Tombol close -->
            <button onclick="document.getElementById('modal-edit-stok').classList.add('hidden')"
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl">&times;</button>

            <h3 class="text-lg font-semibold mb-4">Edit Stok Barang</h3>

            <form id="form-edit-stok" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block font-medium text-sm">Produk</label>
                    <input type="text" id="edit-nama-produk" class="w-full border-gray-300 rounded p-2 bg-gray-100"
                        disabled>
                </div>

                <div>
                    <label for="edit-warehouse-id" class="block font-medium text-sm">Gudang</label>
                    <select name="warehouse_id" id="edit-warehouse-id" class="w-full border-gray-300 rounded p-2">
                        @foreach($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}">{{ $warehouse->nama }}</option>
                        @endforeach
                    </select>
                </div>


                <div>
                    <label for="edit-jumlah" class="block font-medium text-sm">Jumlah</label>
                    <input type="number" name="jumlah" id="edit-jumlah" min="0" required
                        class="w-full border-gray-300 rounded p-2" />
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(id, namaProduk, namaGudang, jumlah, warehouseId) {
            const modal = document.getElementById('modal-edit-stok');
            document.getElementById('edit-nama-produk').value = namaProduk;
            document.getElementById('edit-jumlah').value = jumlah;

            const warehouseSelect = document.getElementById('edit-warehouse-id');
            warehouseSelect.value = warehouseId; // <-- Atur selected option

            const form = document.getElementById('form-edit-stok');
            form.action = `/stok/${id}`;

            modal.classList.remove('hidden');
        }

        document.addEventListener('click', function (e) {
            const modal = document.getElementById(['modal-stok', 'modal-edit-stok'].find(id => document.getElementById(id) && !document.getElementById(id).classList.contains('hidden')));
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    </script>
@endsection
