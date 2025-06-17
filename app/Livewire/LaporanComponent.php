<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use Livewire\Attributes\On;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanComponent extends Component
{
    public $tanggal1, $tanggal2;
    #[On('lihat-laporan')]
    public function render()
    {
        if ($this->tanggal2 != "") {
            $data['transaksi'] = Transaksi::where('status', 'Selesai')
                ->whereBetween('tgl_pesan', [$this->tanggal1, $this->tanggal2])
                ->paginate(10);
        } else {
            $data['transaksi'] = Transaksi::where('status', 'Selesai')->paginate(10);
        }

        return view('livewire.laporan-component', $data);
    }

    public function filter()
    {

        // Validasi agar tanggal1 dan tanggal2 wajib diisi
        $this->validate([
            'tanggal1' => 'required|date',
            'tanggal2' => 'required|date|after_or_equal:tanggal1',
        ], [
            'tanggal1.required' => 'Tanggal awal wajib diisi.',
            'tanggal2.required' => 'Tanggal akhir wajib diisi.',
            'tanggal2.after_or_equal' => 'Tanggal akhir harus setelah atau sama dengan tanggal awal.',
        ]);

        // Kirim event untuk render ulang dengan filter
        $this->dispatch('lihat-laporan');
    }
    public function exportpdf()
    {
        if ($this->tanggal2 != "") {
            $data['transaksi'] = Transaksi::with('mobil')
                ->where('status', 'Selesai')
                ->whereBetween('tgl_pesan', [$this->tanggal1, $this->tanggal2])
                ->get();
            $filename = 'Laporan_Transaksi_' . $this->tanggal1 . '_sd_' . $this->tanggal2 . '.pdf';
        } else {
            $data['transaksi'] = Transaksi::with('mobil')
                ->where('status', 'Selesai')
                ->get();
            $filename = 'Laporan_Transaksi_All.pdf';
        }

        $pdf = Pdf::loadView('laporan.export', $data)->output();

        return response()->streamDownload(
            fn() => print($pdf),
            $filename
        );
    }
}
