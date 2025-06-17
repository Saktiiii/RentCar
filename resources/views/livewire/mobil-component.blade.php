<div>
    <div class="container-fluid">
        <h2 class="intro-y text-lg font-medium mt-10">
            Data Mobil
        </h2>
        <button wire:click="create" class="btn btn-twitter mt-6 w-40 mr-2 h-8 mb-2"> Tambah Mobil </button>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-5">
            <thead class="table-light">
                <tr>
                    <th class="whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">Nopol</th>
                    <th class="whitespace-nowrap">Merk</th>
                    <th class="whitespace-nowrap">Jenis</th>
                    <th class="whitespace-nowrap">Foto</th>
                    <th class="whitespace-nowrap">Harga</th>
                    <th class="whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mobil as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nopolisi }}</td>
                        <td>{{ $data->merk }}</td>
                        <td>{{ $data->jenis }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $data->foto) }}" width="150">
                        </td>
                        <td>Rp {{ number_format($data->harga, 0, ',', '.') }}</td>
                        <td>
                            <button class="btn btn-elevated-primary w-24 mr-1 mb-2" wire:click="edit({{ $data->id }})">Edit</button>
                            <button class="btn btn-elevated-danger w-24 mr-1 mb-2" wire:click="destroy({{ $data->id }})">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Data Mobil Belum tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $mobil->links() }}

        @if ($addPage)
            @include('mobil.create')
        @endif
        @if ($editpage)
            @include('mobil.edit')
        @endif
    </div>
</div>
