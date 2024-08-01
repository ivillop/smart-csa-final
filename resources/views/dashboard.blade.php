@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <div class="card-list">
        <div class="card-item surat-keluar">
            <h2>Surat Keluar</h2>
            <p>{{ $jumlahSuratKeluar }} Surat</p>
        </div>
        <div class="card-item surat-masuk">
            <h2>Surat Masuk</h2>
            <p>{{ $jumlahSuratMasuk }} Surat</p>
        </div>
    </div>
    <div class="card-list">
        <div class="card-item agenda-acara">
            <h2>Agenda Acara</h2>
            <p>{{ $jumlahAgendaAcara }} Acara</p>
        </div>
        <div class="card-item kelola-ruangan">
            <h2>Kelola Ruangan</h2>
            <p>{{ $jumlahRuangan }} Ruangan</p>
        </div>
    </div>
@endsection
