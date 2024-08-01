@extends('layouts.app')

@section('content')
    <h1>Agenda Acara</h1>
    <div class="add-form">
        <a href="{{ route('agenda-acara.create') }}">Tambah Agenda Acara</a>
    </div>
    @if ($message = Session::get('success'))
        <div>{{ $message }}</div>
    @endif
    <table id="agenda-acara" class="display" style="width: 100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Acara</th>
                <th>Tanggal Pelaksanaan</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Lokasi</th>
                <th>Penyelenggara</th>
                <th>Prioritas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($agendaAcaras as $index => $agendaAcara)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $agendaAcara->nama_acara }}</td>
                    <td>{{ $agendaAcara->tanggal_pelaksanaan }}</td>
                    <td>{{ $agendaAcara->waktu_mulai }}</td>
                    <td>{{ $agendaAcara->waktu_selesai }}</td>
                    <td>{{ $agendaAcara->lokasi }}</td>
                    <td>{{ $agendaAcara->penyelenggara }}</td>
                    <td>
                        <span class="priority {{ strtolower($agendaAcara->prioritas) }}">
                            {{ $agendaAcara->prioritas }}
                        </span>
                    </td>
                    <td>
                        <span class="status {{ strtolower($agendaAcara->status) }}">
                            {{ $agendaAcara->status }}
                        </span>
                    </td>
                    <td class="action-item">
                        <a href="{{ route('agenda-acara.edit', $agendaAcara->id) }}"><i
                                class="fa-regular fa-pen-to-square"></i></a>
                        <form action="{{ route('agenda-acara.destroy', $agendaAcara->id) }}" method="POST"
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
