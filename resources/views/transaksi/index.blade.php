@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Daftar Transaksi</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <button onclick="window.location.href='{{ route('transaksi.create') }}'"
            class="bg-blue-600 text-white px-4 py-2 rounded mb-4">
            + Tambah Transaksi
        </button>

        <div class="overflow-x-auto bg-white rounded shadow p-4">
            <table class="min-w-full text-sm table-auto border border-gray-200">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Pelanggan</th>
                        <th class="px-4 py-2 border">Metode</th>
                        <th class="px-4 py-2 border">Total</th>
                        <th class="px-4 py-2 border">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $trx)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $trx->created_at->format('d M Y H:i') }}</td>
                            <td class="px-4 py-2">{{ $trx->nama_pelanggan ?? '-' }}</td>
                            <td class="px-4 py-2 capitalize">{{ $trx->metode_pembayaran }}</td>
                            <td class="px-4 py-2">Rp{{ number_format($trx->total, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">
                                <button onclick="toggleDetail({{ $trx->id }})"
                                    class="text-blue-600 hover:underline">Lihat</button>
                                <!-- Tombol Hapus -->
                                <button onclick="openDeleteModal({{ $trx->id }})" class="text-red-600 hover:underline">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        <tr id="detail-{{ $trx->id }}" class="hidden bg-gray-50 border-t">
                            <td colspan="5" class="px-4 py-3">
                                <strong>Barang:</strong>
                                <ul class="list-disc pl-5 mt-2 space-y-1">
                                    @foreach($trx->items as $item)
                                        <li>
                                            {{ $item->product->nama }} dari gudang <strong>{{ $item->warehouse->nama }}</strong>
                                            ({{ $item->jumlah }} x Rp{{ number_format($item->harga_satuan, 0, ',', '.') }} =
                                            <strong>Rp{{ number_format($item->subtotal, 0, ',', '.') }}</strong>)
                                        </li>
                                    @endforeach
                                </ul>
                                @if($trx->potongan > 0)
                                    <p class="mt-2 text-sm text-gray-600">Potongan:
                                        Rp{{ number_format($trx->potongan, 0, ',', '.') }}</p>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center px-4 py-3 text-gray-500">Belum ada transaksi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Delete -->
    <div id="deleteModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded shadow-md max-w-sm w-full">
            <h2 class="text-lg font-bold mb-4">Konfirmasi Hapus</h2>
            <p class="mb-6 text-sm text-gray-600">Yakin ingin menghapus transaksi ini? Stok akan dikembalikan.</p>

            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleDetail(id) {
            const row = document.getElementById('detail-' + id);
            row.classList.toggle('hidden');
        }
        function openDeleteModal(id) {
            const form = document.getElementById('deleteForm');
            form.action = `/transaksi/${id}`;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('flex');
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
@endsection
