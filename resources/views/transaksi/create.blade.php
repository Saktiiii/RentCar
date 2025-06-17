<div class="card shadow-sm rounded mt-5">
    <div class="card-header">
        <h2 class="intro-y text-lg font-medium mt-5 mb-3">
            Data Transaksi
        </h2>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="store">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nopolisi" class="form-label">Nama Pemesan</label>
                    <input id="nopolisi" type="text" wire:model="nama" class="form-control" placeholder="Input Nama">
                    @error('nama')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="col-md-6">
                    <label for="ponsel" class="form-label">No. Ponsel</label>
                    <input id="ponsel" type="text" wire:model="ponsel" class="form-control" placeholder="Input No. Ponsel">
                    @error('ponsel')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="col-md-12">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input id="alamat" type="text" wire:model="alamat" class="form-control" placeholder="Input Alamat">
                    @error('alamat')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="col-md-6">
                    <label for="lama" class="form-label">Lama Sewa (hari)</label>
                    <input id="lama" type="number" wire:model="lama" wire:change="hitung" class="form-control" placeholder="Masukkan jumlah hari">
                    @error('lama')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="col-md-6">
                    <label for="tanggal" class="form-label">Tanggal Pemesanan</label>
                    <input id="tanggal" type="date" wire:model="tgl_pesan" class="form-control">
                    @error('tgl_pesan')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="col-md-12">
                    <label class="form-label">Total Harga</label>
                    <input type="text" class="form-control" value="{{ $total }}" readonly>
                </div>

                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-success w-100" wire:loading.attr="disabled">
                        Simpan Transaksi
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
