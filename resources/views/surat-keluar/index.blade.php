@extends('layouts.app')

@section('content')
    <h1>Surat Keluar</h1>
    <div class="add-form">
        <a href="{{ route('surat-keluar.create') }}">Tambah Surat Keluar</a>
    </div>
    @if ($message = Session::get('success'))
        <div>{{ $message }}</div>
    @endif
    <table id="surat-keluar" class="display" style="width: 100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Surat</th>
                <th>Perihal</th>
                <th>File Surat</th>
                <th>Dibuat Oleh</th>
                <th>Aksi</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suratKeluars as $index => $suratKeluar)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $suratKeluar->nomor_surat }}</td>
                    <td>{{ $suratKeluar->perihal }}</td>
                    <td>
                        @if ($suratKeluar->file_surat)
                            <a href="{{ asset('storage/' . $suratKeluar->file_surat) }}" target="_blank"><i
                                    class="fa-solid fa-print"></i></a>
                        @else
                            Tidak ada surat
                        @endif
                    </td>
                    <td>{{ $suratKeluar->user->name }}</td>
                    <td class="action-item">
                        <a href="{{ route('surat-keluar.edit', $suratKeluar->id) }}"><i
                                class="fa-regular fa-pen-to-square"></i></a>
                        <form action="{{ route('surat-keluar.destroy', $suratKeluar->id) }}" method="POST"
                            style="display:inline-block; padding:0; width:100%;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                    <td>{{ $suratKeluar->tanggal_dibuat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
