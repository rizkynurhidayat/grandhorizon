<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Grand Horizon</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        body {
            display: flex;
            min-height: 100vh;
            background: #f8f9fa;
        }

        .sidebar {
            width: 250px;
            background: #343a40;
            color: white;
            padding: 20px;
            position: fixed;
            height: 100%;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #495057;
        }

        .content {
            flex: 1;
            margin-left: 250px;
            /* Agar konten tidak tertutup sidebar fixed */
            padding: 30px;
        }

        /* Fix agar dropdown tidak terpotong table-responsive */
        .table-responsive {
            overflow: visible !important;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h4>Grand Horizon</h4>
        <hr>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">🏠
            Dashboard</a>
        <a href="{{ route('hero.edit') }}" class="{{ request()->routeIs('hero.*') ? 'active' : '' }}">🖼️ Hero
            Section</a>
        <a href="{{ route('tentang.edit') }}" class="{{ request()->routeIs('tentang.*') ? 'active' : '' }}">ℹ️
            Tentang</a>

        {{-- LINK TIPE RUMAH AKTIF --}}
        <a href="{{ route('tiperumah.index') }}" class="{{ request()->routeIs('tiperumah.*') ? 'active' : '' }}">🏢 Tipe
            Rumah</a>

        <a href="{{ route('fasilitas.index') }}" class="{{ request()->routeIs('fasilitas.*') ? 'active' : '' }}">🌟
            Fasilitas</a>
        <a href="#">📸 Galeri Perumahan</a>
        <a href="#">💬 Testimoni</a>
        <a href="{{ route('admin.hubungi-kami.index') }}"
            class="{{ request()->routeIs('admin.hubungi-kami.*') ? 'active' : '' }}">📧 Pesan Masuk</a>
        <hr>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger w-100">Keluar</button>
        </form>
    </div>

    <div class="content">
        @if(View::hasSection('content'))
            @yield('content')
        @else
            <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p>Gunakan menu di samping untuk mengelola konten website Grand Horizon.</p>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card bg-primary text-white p-3 border-0 shadow-sm">
                        <h5>Total Tipe Rumah</h5>
                        {{-- Data dinamis dari controller --}}
                        <h3>{{ $tipeRumahCount ?? '0' }} Unit</h3>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>