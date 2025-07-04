@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Buat Transaksi Baru</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('transaksi.store') }}" method="POST" id="form-transaksi">
            @csrf

            <div class="mb-4">
                <label class="block font-medium">Nama Pelanggan (Opsional)</label>
                <input type="text" name="nama_pelanggan" class="w-full border rounded p-2" />
            </div>

            <div class="mb-4">
                <label class="block font-medium">Metode Pembayaran</label>
                <select name="metode_pembayaran" class="w-full border rounded p-2" required>
                    <option value="tunai">Cash</option>
                    <option value="transfer">Transfer</option>
                    <option value="qris">QRIS</option>
                </select>
            </div>

            <!-- Items -->
            <div class="mb-6">
                <h4 class="font-semibold text-lg mb-2">Daftar Barang</h4>
                <table class="w-full table-auto text-sm border border-gray-300" id="items-table">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-2 py-1">Produk</th>
                            <th class="border px-2 py-1">Gudang</th>
                            <th class="border px-2 py-1">Jumlah</th>
                            <th class="border px-2 py-1">Harga Satuan</th>
                            <th class="border px-2 py-1">Subtotal</th>
                            <th class="border px-2 py-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="items-body">
                        <!-- JS akan isi -->
                    </tbody>
                </table>

                <button type="button" class="mt-3 bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded"
                    onclick="addRow()">
                    + Tambah Barang
                </button>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Potongan (opsional)</label>
                <input type="number" name="potongan" id="potongan" value="0" class="w-full border rounded p-2" />
            </div>

            <div class="mb-6">
                <label class="block font-medium">Total</label>
                <input type="text" readonly id="total-display" class="w-full border rounded p-2 bg-gray-100" value="Rp0" />
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Simpan Transaksi
            </button>
        </form>
    </div>

    <script>
        let products = @json($products);
        let warehouses = @json($warehouses);
        let rowIndex = 0;

        function addRow() {
            let tr = document.createElement('tr');
            tr.innerHTML = `
                    <td class="border px-2 py-1">
                        <select name="items[${rowIndex}][product_id]" class="product-select w-full border rounded p-1" required onchange="updateHarga(this)">
                            ${products.map(p => `<option value="${p.id}" data-harga="${p.harga_jual}">${p.nama}</option>`).join('')}
                        </select>
                    </td>
                    <td class="border px-2 py-1">
                        <select name="items[${rowIndex}][warehouse_id]" class="w-full border rounded p-1" required>
                            ${warehouses.map(w => `<option value="${w.id}">${w.nama}</option>`).join('')}
                        </select>
                    </td>
                    <td class="border px-2 py-1">
                        <input type="number" name="items[${rowIndex}][jumlah]" class="jumlah w-full border rounded p-1" min="1" value="1" required />
                    </td>
                    <td class="border px-2 py-1">
                        <input type="text" class="harga-display w-full border rounded p-1 bg-gray-100" value="Rp0" readonly />
                    </td>
                    <td class="border px-2 py-1">
                        <input type="text" class="subtotal w-full border rounded p-1 bg-gray-100" value="Rp0" readonly />
                    </td>
                    <td class="border px-2 py-1 text-center">
                        <button type="button" onclick="this.closest('tr').remove(); hitungTotal()" class="text-red-600 hover:underline">Hapus</button>
                    </td>
                `;
            document.getElementById('items-body').appendChild(tr);
            rowIndex++;
            updateAllHarga();
            hitungTotal();
        }

        function updateHarga(selectEl) {
            const harga = parseInt(selectEl.selectedOptions[0].dataset.harga || 0);
            const tr = selectEl.closest('tr');
            tr.dataset.harga = harga;
            tr.querySelector('.harga-display').value = formatRupiah(harga);
            hitungTotal();
        }

        function updateAllHarga() {
            document.querySelectorAll('.product-select').forEach(select => {
                updateHarga(select);
            });
        }


        function hitungTotal() {
            let total = 0;
            document.querySelectorAll('#items-body tr').forEach(tr => {
                const jumlah = parseInt(tr.querySelector('.jumlah')?.value || 0);
                const harga = parseInt(tr.dataset.harga || 0);
                const subtotal = jumlah * harga;
                tr.querySelector('.subtotal').value = formatRupiah(subtotal);
                total += subtotal;
            });

            const potongan = parseInt(document.getElementById('potongan').value || 0);
            total -= potongan;
            document.getElementById('total-display').value = formatRupiah(Math.max(total, 0));
        }


        function formatRupiah(angka) {
            return 'Rp' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        document.addEventListener('input', function (e) {
            if (e.target.classList.contains('jumlah') || e.target.classList.contains('harga') || e.target.id === 'potongan') {
                hitungTotal();
            }
        });

        // Add row pertama
        addRow();
    </script>
@endsection
