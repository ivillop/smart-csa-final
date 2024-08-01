@extends('layouts.app')

@section('content')
    <h1>Surat Masuk</h1>

    <div class="add-form">
        <a class="disposisi" href="{{ route('surat-masuk.create-disposisi') }}">Tambah Disposisi Surat</a>
        <a class="revisi" href="{{ route('surat-masuk.create-revisi') }}">Tambah Revisi Surat</a>
    </div>

    <h2>Disposisi Surat</h2>
    <table id="disposisi-surat" class="display" style="width: 100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Dibuat</th>
                <th>Pemberi Disposisi</th>
                <th>Penerima Disposisi</th>
                <th>Instruksi Disposisi</th>
                <th>Status Disposisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($disposisiSurats as $index => $disposisi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $disposisi->tanggal_dibuat }}</td>
                    <td>{{ $disposisi->pemberi_disposisi }}</td>
                    <td>{{ $disposisi->penerima_disposisi }}</td>
                    <td>{{ $disposisi->instruksi_disposisi }}</td>
                    <td>
                        <span class="status-surat-masuk {{ strtolower($disposisi->status_disposisi) }}">
                            {{ $disposisi->status_disposisi }}
                        </span>
                    </td>
                    <td class="action-item">
                        <form action="{{ route('surat-masuk.destroy-disposisi', $disposisi->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
            @endforeach
        </tbody>
    </table>

    <h2>Revisi Surat</h2>
    <table id="revisi-surat" class="display" style="width: 100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Dibuat</th>
                <th>Pemberi Revisi</th>
                <th>File Surat</th>
                <th>Status Revisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($revisiSurats as $index => $revisi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $revisi->tanggal_dibuat }}</td>
                    <td>{{ $revisi->pemberi_revisi }}</td>
                    <td>
                        @if ($revisi->file_surat)
                            <a href="{{ asset('storage/' . $revisi->file_surat) }}" target="_blank"><i
                                    class="fa-solid fa-print"></i></a>
                        @else
                            Tidak ada file
                        @endif
                    </td>
                    <td>
                        <span class="status-surat-masuk {{ strtolower($revisi->status_revisi) }}">
                            {{ $revisi->status_revisi }}
                        </span>
                    </td>
                    <td class="action-item">
                        <form action="{{ route('surat-masuk.destroy-revisi', $revisi->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
