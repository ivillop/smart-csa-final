@extends('layouts.app')

@section('content')
    <h1>Kelola Ruangan</h1>
    <div class="add-form">
        <a href="{{ route('ruangan.create') }}">Tambah Ruangan</a>
    </div>
    @if ($message = Session::get('success'))
        <div>{{ $message }}</div>
    @endif
    <table id="ruangan" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ruangan</th>
                <th>Kapasitas</th>
                <th>Status</th>
                <th>Tanggal Peminjaman</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Peminjam</th>
                <th>Kontak Peminjam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruangans as $index => $ruangan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $ruangan->nama_ruangan }}</td>
                    <td>{{ $ruangan->kapasitas }}</td>
                    <td>
                        <span class="status-ruangan {{ strtolower($ruangan->status_ruangan) }}">
                            {{ $ruangan->status_ruangan }}
                        </span>
                    </td>
                    <td>{{ $ruangan->tanggal_peminjaman }}</td>
                    <td>{{ $ruangan->waktu_mulai }}</td>
                    <td>{{ $ruangan->waktu_selesai }}</td>
                    <td>{{ $ruangan->peminjam }}</td>
                    <td>{{ $ruangan->kontak_peminjam }}</td>
                    <td class="action-item">
                        <a href="{{ route('ruangan.edit', $ruangan->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                        <form action="{{ route('ruangan.destroy', $ruangan->id) }}" method="POST"
                            style="display:inline-block;">
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
