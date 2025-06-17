<div>
    <h2 class="intro-y text-lg font-medium mt-5 mb-3">
        Form Tambah
    </h2>
    <form wire:submit.prevent="store">
        <div>
            <label for="nopolisi" class="form-label">Input Nopol</label>
            <input id="nopolisi" type="text" wire:model="nopolisi" class="form-control" placeholder="Input Nopol">
        </div>
        @error('nopolisi')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <div>
            <label for="merk" class="form-label">Input Merk</label>
            <input id="merk" type="text" wire:model="merk" class="form-control" placeholder="Input Merk">
        </div>
        @error('merk')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <div>
            <label for="jenis" class="form-label">Input Jenis Mobil</label>
            <select id="jenis" wire:model="jenis" class="form-control">
                <option value="">--Pilih--</option>
                <option value="sedan">Sedan</option>
                <option value="suv">Suv</option>
                <option value="mpv">Mpv</option>
                <option value="truk">Truk</option>
                <option value="bus">Bus</option>
                <option value="motor">Motor</option>
            </select>
        </div>
        @error('jenis')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <div>
            <label for="harga" class="form-label">Input harga</label>
            <input id="harga" type="text" wire:model="harga" class="form-control" placeholder="Input harga">
        </div>
        @error('harga')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <div>
            <label for="foto" class="form-label">Input Foto</label>
            <input id="foto" type="file" wire:model="foto" class="form-control">
            @error('foto')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <div wire:loading wire:target="foto">Mengunggah foto...</div>
        </div>
        <button type="submit" class="btn btn-primary mr-1 mb-2 mt-3" wire:loading.attr="disabled" wire:target="foto">
            Simpan
        </button>
    </form>
</div>