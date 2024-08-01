@extends('layouts.app')

@section('content')
    <h1>Edit Agenda Acara</h1>
    <form class="edit-form" method="POST" action="{{ route('agenda-acara.update', $agendaAcara->id) }}">
        @csrf
        @method('PUT')
        <div class="input-list">
            <div class="input-flex">
                <div class="input-item">
                    <label>Nama Acara</label>
                    <input type="text" name="nama_acara" value="{{ $agendaAcara->nama_acara }}">
                    @error('nama_acara')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-item">
                    <label>Tanggal Pelaksanaan</label>
                    <input type="date" name="tanggal_pelaksanaan" value="{{ $agendaAcara->tanggal_pelaksanaan }}">
                    @error('tanggal_pelaksanaan')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-item">
                    <label>Waktu Mulai</label>
                    <input type="time" name="waktu_mulai" value="{{ $agendaAcara->waktu_mulai }}">
                    @error('waktu_mulai')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-item">
                    <label>Waktu Selesai</label>
                    <input type="time" name="waktu_selesai" value="{{ $agendaAcara->waktu_selesai }}">
                    @error('waktu_selesai')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="input-flex">
                <div class="input-item">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" value="{{ $agendaAcara->lokasi }}">
                    @error('lokasi')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-item">
                    <label>Penyelenggara</label>
                    <input type="text" name="penyelenggara" value="{{ $agendaAcara->penyelenggara }}">
                    @error('penyelenggara')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-item">
                    <label>Prioritas</label>
                    <select name="prioritas">
                        <option value="High" {{ $agendaAcara->prioritas == 'High' ? 'selected' : '' }}>High</option>
                        <option value="Medium" {{ $agendaAcara->prioritas == 'Medium' ? 'selected' : '' }}>Medium</option>
                        <option value="Low" {{ $agendaAcara->prioritas == 'Low' ? 'selected' : '' }}>Low</option>
                    </select>
                    @error('prioritas')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-item">
                    <label>Status</label>
                    <select name="status">
                        <option value="Planned" {{ $agendaAcara->status == 'Planned' ? 'selected' : '' }}>Planned</option>
                        <option value="Ongoing" {{ $agendaAcara->status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="Completed" {{ $agendaAcara->status == 'Completed' ? 'selected' : '' }}>Completed
                        </option>
                        <option value="Cancelled" {{ $agendaAcara->status == 'Cancelled' ? 'selected' : '' }}>Cancelled
                        </option>
                    </select>
                    @error('status')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
