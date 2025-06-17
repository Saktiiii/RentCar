<div class="mt-4">
    <h2 class="intro-y text-lg font-medium mt-10">
        Data Transaksi
    </h2>
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped table-auto w-full text-sm">
            <thead class="table-light">
                <tr>
                    <th class="w-5">#</th>
                    <th class="w-24 text-nowrap">Nopol</th>
                    <th class="w-28 text-nowrap">Nama</th>
                    <th class="w-24 text-nowrap">Ponsel</th>
                    <th class="w-28 text-nowrap">Alamat</th>
                    <th class="w-28 text-nowrap">Tanggal</th>
                    <th class="w-20 text-nowrap">Lama</th>
                    <th class="w-32 text-nowrap">Total</th>
                    <th class="w-24 text-nowrap">Status</th>
                    @auth
                        @if(Auth::user()->role === 'pemilik')
                            <th class="w-16 text-nowrap">Aksi</th>
                        @endif
                    @endauth
                </tr>
            </thead>
            <tbody>
                @forelse ($transaksi as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- Cek apakah relasi mobil ada --}}
                        @if ($data->mobil)
                            <td>{{ $data->mobil->nopolisi }}</td>
                        @else
                            <td colspan="3" class="text-danger">Mobil tidak ditemukan (mobil_id: {{ $data->mobil_id }})</td>
                        @endif
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->ponsel }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->tgl_pesan)->format('d-m-Y') }}</td>
                        <td>{{ $data->lama }} hari</td>
                        <td>Rp{{ number_format($data->total) }}</td>
                        <td>
                            <span class="badge bg-{{ $data->status == 'Tunggu' ? 'warning' : 'success' }}">
                                {{ $data->status }}
                            </span>
                        </td>
                        <td>
                            @auth
                                @if(Auth::user()->role === 'pemilik')
                                    @if ($data->status == 'Tunggu')
                                        <button class="btn btn-sm btn-success px-2 py-1 text-sm"
                                            wire:click="proses({{ $data->id }})">Proses</button>
                                    @endif
                                    @if ($data->status == 'Proses')
                                        <button class="btn btn-sm btn-secondary px-2 py-1 text-sm"
                                            wire:click="selesai({{ $data->id }})">Selesai</button>
                                    @endif
                                @endif
                            @endauth
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center">Data Transaksi belum tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-2">
            {{ $transaksi->links() }}
        </div>
    </div>
</div>