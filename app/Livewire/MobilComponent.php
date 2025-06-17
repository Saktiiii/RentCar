<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mobil;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class MobilComponent extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $addPage, $editpage = false;
    public $nopolisi, $merk, $jenis, $kapasitas, $harga, $foto, $id;
    public function render()
    {
        $data['mobil'] = Mobil::paginate(5);
        return view('livewire.mobil-component', $data);
    }
    public function create()
    {
        $this->addPage = true;
    }
    public function store()
    {
        $this->validate([
            'nopolisi' => 'required',
            'merk' => 'required',
            'jenis' => 'required',
            'harga' => 'required|numeric',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        // Simpan file ke storage/app/public/mobil dan beri nama unik
        $filename = $this->foto->store('mobil', 'public'); // return: 'mobil/namafile.jpg'
    
        Mobil::create([
            'user_id'   => Auth::id(),
            'nopolisi'  => $this->nopolisi,
            'merk'      => $this->merk,
            'jenis'     => $this->jenis,
            'harga'     => $this->harga,
            'foto'      => $filename, // simpan path-nya, bukan nama doang
        ]);
    
        session()->flash('success', 'Data berhasil ditambahkan');
        $this->reset();
    }
    

    public function update()
    {
        $mobil = Mobil::find($this->id);

        if (is_object($this->foto) && method_exists($this->foto, 'store')) {
            // Jika ada file baru, hapus yang lama dan simpan yang baru
            Storage::delete('public/mobil/' . $mobil->foto);
            $path = $this->foto->store('public/mobil');
            $filename = basename($path);

            $mobil->update([
                'nopolisi' => $this->nopolisi,
                'merk' => $this->merk,
                'jenis' => $this->jenis,
                'harga' => $this->harga,
                'foto' => $filename,
            ]);
        } else {
            // Kalau tidak ada file baru, update tanpa ubah foto
            $mobil->update([
                'nopolisi' => $this->nopolisi,
                'merk' => $this->merk,
                'jenis' => $this->jenis,
                'harga' => $this->harga,
            ]);
        }

        session()->flash('success', 'Data berhasil diupdate');
        $this->reset();
    }

    public function edit($id)
    {
        $this->editpage = true;
        $this->id = $id;
        $mobil = Mobil::find($id);
        $this->nopolisi = $mobil->nopolisi;
        $this->merk = $mobil->merk;
        $this->jenis = $mobil->jenis;
        $this->harga = $mobil->harga;
        $this->foto = $mobil->foto;
    }


    public function destroy($id)
    {
        $mobil = Mobil::find($id);
        Storage::delete('mobil/' . $mobil->foto);
        $mobil->delete();
        session()->flash('success', 'Data berhasil dihapus');
    }
}
