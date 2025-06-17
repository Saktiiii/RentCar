<?php

namespace App\Livewire;

use App\Models\Mobil;
use App\Models\Transaksi;
use Illuminate\Contracts\Session\Session;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TransaksiComponent extends Component
{
    use WithPagination,WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $addPage,$lihatpage = false;
    public $nama,$ponsel,$alamat,$lama,$tgl_pesan,$total,$status,$mobil_id,$harga;
    public function render()
    {
        $data['mobil'] = Mobil::paginate(5);   
        return view('livewire.transaksi-component',$data);
    }
    public function create($id,$harga){
        $this->mobil_id = $id;
        $this->harga = $harga;
        $this->addPage = true;
    }
    public function store()
    {
        $this->total = $this->lama * $this->harga;

        $this->validate([
            'nama' => 'required',
            'ponsel' => 'required',
            'alamat' => 'required',
            'lama' => 'required|numeric|min:1',
            'tgl_pesan' => 'required|date',
            'total' => 'required|numeric|min:1',
        ]);
        $cari = Transaksi::where('mobil_id',$this->mobil_id)
                ->where('tgl_pesan',$this->tgl_pesan)
                ->where('status','!=','Selesai')->count();
        if ($cari == 1) {
            Session()->flash('eror', 'Mobil Sudah ada yang Memesan.');
        }else{
            Transaksi::create([
                'user_id' => Auth::id(),
                'nama' => $this->nama,
                'ponsel' => $this->ponsel,
                'alamat' => $this->alamat,
                'lama' => $this->lama,
                'tgl_pesan' => $this->tgl_pesan,
                'total' => $this->total,
                'status' => 'Tunggu',
                'mobil_id' => $this->mobil_id,
            ]);
    
            session()->flash('message', 'Data berhasil ditambahkan.');
            $this->dispatch('lihat-transaksi');
            $this->reset(['addPage', 'nama', 'ponsel', 'alamat', 'lama', 'tgl_pesan', 'total', 'mobil_id', 'harga']);
        }
    }
    public function hitung(){
        $lama = $this->lama;
        $harga = $this->harga;
        $this->total = $harga * $lama;
    }
    public function lihat($id){
        $this->lihatpage = true;
        $data = Transaksi::find($id);
        
    }
}
