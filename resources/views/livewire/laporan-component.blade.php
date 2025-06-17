<div>
    <div class="container-fluid">
        <h2 class="intro-y text-lg font-medium mt-10">
            Data Laporan
        </h2>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <h3 class="font-bold text-lg text-center mb-2">Masukkan Tanggal</h3>

        <!-- Form Filter Tanggal -->
        <label for="tanggal1">Dari:</label>
        <input type="date" id="tanggal1" class="form-control mb-3" wire:model="tanggal1">

        <label for="tanggal2">Sampai:</label>
        <input type="date" id="tanggal2" class="form-control mb-4" wire:model="tanggal2">

        <!-- Tombol Filter & Export di kanan -->
        <div class="flex justify-end gap-2 mb-4">
            <button type="button" wire:click="filter" class="btn btn-primary w-32">
                <i data-lucide="calendar" class="w-4 h-4 mr-2"></i> Filter
            </button>
            <button type="button" wire:click="exportpdf" class="btn btn-success w-32">
                <i data-lucide="download" class="w-4 h-4 mr-2"></i> Export
            </button>
        </div>

        <!-- Table Data -->
        <table class="table mt-5">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Nopol</th>
                    <th>Nama Pemesan</th>
                    <th>Tgl Pesan</th>
                    <th>Alamat</th>
                    <th>Lama</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaksi as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->mobil->nopolisi }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->tgl_pesan)->format('d-m-Y') }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->lama }} hari</td>
                        <td>Rp{{ number_format($data->total) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Data Transaksi belum tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>