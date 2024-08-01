<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/f5ed80d948.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.2/datatables.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/dt/dt-2.1.2/datatables.js"></script>
</head>

<body>
    <div class="sidebar">
        <h2>Smart <span>CSA</span></h2>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        @if (in_array(Auth::user()->role, ['Sekretaris']))
            <a href="{{ route('surat-keluar.index') }}">Surat Keluar</a>
        @else
            <a href="#" class="disabled">Surat Keluar</a>
        @endif

        @if (in_array(Auth::user()->role, ['Sekretaris', 'Ketua-UKM', 'BEM', 'Kemahasiswaan']))
            <a href="{{ route('surat-masuk.index') }}">Surat Masuk</a>
        @else
            <a href="#" class="disabled">Surat Masuk</a>
        @endif

        @if (in_array(Auth::user()->role, ['Sekretaris']))
            <a href="{{ route('agenda-acara.index') }}">Agenda Acara</a>
        @else
            <a href="#" class="disabled">Agenda Acara</a>
        @endif

        @if (in_array(Auth::user()->role, ['BAU']))
            <a href="{{ route('ruangan.index') }}">Kelola Ruangan</a>
        @else
            <a href="#" class="disabled">Kelola Ruangan</a>
        @endif

        @if (in_array(Auth::user()->role, ['BAU']))
            <a href="{{ route('access.index') }}">Hak Akses</a>
        @else
            <a href="#" class="disabled">Hak Akses</a>
        @endif
    </div>
    <div class="navbar">
        <a href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
    </div>
    <div class="content">
        @yield('content')
    </div>
    <script>
        let table = new DataTable('#surat-keluar', {
            layout: {
                topEnd: {
                    search: {
                        placeholder: 'Search'
                    }
                }
            }
        });

        new DataTable('#agenda-acara', {
            layout: {
                topEnd: {
                    search: {
                        placeholder: 'Search'
                    }
                }
            }
        });

        new DataTable('#ruangan', {
            layout: {
                topEnd: {
                    search: {
                        placeholder: 'Search'
                    }
                }
            }
        });

        new DataTable('#disposisi-surat', {
            layout: {
                topEnd: {
                    search: {
                        placeholder: 'Search'
                    }
                }
            }
        });

        new DataTable('#revisi-surat', {
            layout: {
                topEnd: {
                    search: {
                        placeholder: 'Search'
                    }
                }
            }
        });

        new DataTable('#access-user', {
            layout: {
                topEnd: {
                    search: {
                        placeholder: 'Search'
                    }
                }
            }
        });
    </script>
</body>

</html>
