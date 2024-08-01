@extends('layouts.app')

@section('content')
    <h1>Hak Akses</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h2>Daftar Pengguna</h2>
            <table id="access-user" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Peran</th>
                        <th>Ubah Peran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <form class="update-role" action="{{ route('access.updateRole', $user->id) }}" method="POST">
                                    @csrf
                                    <select name="role" class="form-control">
                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="Sekretaris" {{ $user->role == 'Sekretaris' ? 'selected' : '' }}>
                                            Sekretaris</option>
                                        <option value="Ketua-UKM" {{ $user->role == 'Ketua-UKM' ? 'selected' : '' }}>
                                            Ketua-UKM</option>
                                        <option value="BEM" {{ $user->role == 'BEM' ? 'selected' : '' }}>BEM</option>
                                        <option value="Kemahasiswaan"
                                            {{ $user->role == 'Kemahasiswaan' ? 'selected' : '' }}>Kemahasiswaan</option>
                                        <option value="BAU" {{ $user->role == 'BAU' ? 'selected' : '' }}>BAU</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-2"><i
                                            class="fa-regular fa-circle-check"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
