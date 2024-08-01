<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\DisposisiSurat;
use App\Models\RevisiSurat;
use App\Models\AgendaAcara;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahSuratKeluar = SuratKeluar::count();
        $jumlahDisposisiSurat = DisposisiSurat::count();
        $jumlahRevisiSurat = RevisiSurat::count();
        $jumlahSuratMasuk = $jumlahDisposisiSurat + $jumlahRevisiSurat;
        $jumlahAgendaAcara = AgendaAcara::count();
        $jumlahRuangan = Ruangan::count();

        return view('dashboard', compact(
            'jumlahSuratKeluar',
            'jumlahSuratMasuk',
            'jumlahAgendaAcara',
            'jumlahRuangan'
        ));
    }

    public function suratKeluar()
    {
        return view('surat-keluar.index');
    }

    public function suratMasuk()
    {
        return view('surat-masuk.index');
    }

    public function agendaAcara()
    {
        return view('agenda-acara.index');
    }

    public function ruangan()
    {
        return view('ruangan.index');
    }
}
