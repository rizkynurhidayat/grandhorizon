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
            z-index: 1000;
        }

        .sidebar a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: block;
            padding: 12px;
            border-radius: 5px;
            transition: 0.3s;
            margin-bottom: 5px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #495057;
            color: white;
        }

        .content {
            flex: 1;
            margin-left: 250px;
            padding: 30px;
            width: calc(100% - 250px);
        }

        .table-responsive {
            overflow: visible !important;
        }

        .card-stat {
            transition: transform 0.3s;
        }

        .card-stat:hover {
            transform: translateY(-5px);
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h4 class="text-center fw-bold mt-2">Grand Horizon</h4>
        <hr>

        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class='bx bx-home-alt me-2'></i> Dashboard
        </a>

        <a href="{{ route('hero.edit') }}" class="{{ request()->routeIs('hero.*') ? 'active' : '' }}">
            <i class='bx bx-image me-2'></i> Hero Section
        </a>

        <a href="{{ route('tentang.edit') }}" class="{{ request()->routeIs('tentang.*') ? 'active' : '' }}">
            <i class='bx bx-info-circle me-2'></i> Tentang Kami
        </a>

        <a href="{{ route('tiperumah.index') }}" class="{{ request()->routeIs('tiperumah.*') ? 'active' : '' }}">
            <i class='bx bx-building-house me-2'></i> Tipe Rumah
        </a>

        <a href="{{ route('fasilitas.index') }}" class="{{ request()->routeIs('fasilitas.*') ? 'active' : '' }}">
            <i class='bx bx-star me-2'></i> Fasilitas
        </a>



        <a href="#" class="{{ request()->routeIs('galeri.*') ? 'active' : '' }}">
            <i class='bx bx-camera me-2'></i> Galeri Perumahan
        </a>

        <a href="{{ route('admin.hubungi-kami.index') }}"
            class="{{ request()->routeIs('admin.hubungi-kami.*') ? 'active' : '' }}">
            <i class='bx bx-envelope me-2'></i> Pesan Masuk
        </a>

        <hr>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger w-100 border-0 text-start ps-3">
                <i class='bx bx-log-out me-2'></i> Keluar
            </button>
        </form>
    </div>

    <div class="content">
        @if(View::hasSection('content'))
            @yield('content')
        @else
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold mb-1">Selamat Datang, {{ Auth::user()->name }}! 🚀</h2>
                        <p class="text-muted">Kelola konten website Grand Horizon Anda di sini.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card bg-primary text-white p-4 border-0 shadow-sm rounded-4 card-stat">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1 opacity-75">Total Tipe Rumah</h6>
                                    <h3 class="mb-0 fw-bold">{{ $tipeRumahCount ?? '0' }} Unit</h3>
                                </div>
                                <i class='bx bx-building-house fs-1 opacity-50'></i>
                            </div>
                        </div>
                    </div>
                    {{-- Kamu bisa tambah card statistik lain di sini --}}
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>