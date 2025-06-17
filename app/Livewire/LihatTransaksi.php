<?php

namespace App\Livewire;

use App\Models\Transaksi;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\On; 
use Livewire\WithPagination;

class LihatTransaksi extends Component
{
    use WithPagination, WithoutUrlPagination;
    #[On('lihat-transaksi')]
    public function render()
    {
        $data['transaksi'] = Transaksi::paginate(10);
        return view('livewire.lihat-transaksi', $data);
    }
    public function proses($id){
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'status' => 'Proses'
        ]);
        session()->flash('success', 'Berhasil Di Proses');
        $this->dispatch('lihat-transaksi');
    }
    public function selesai($id){
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'status' => 'Selesai'
        ]);
        session()->flash('success', 'Berhasil Di Selesaikan');
        $this->dispatch('lihat-transaksi');
    }
}
