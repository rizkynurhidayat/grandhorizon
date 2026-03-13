<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Grand Horizon</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #3699ff;
            --bg-body: #f5f8fa;
            --light: #ffffff;
            --text-gray: #7e8299;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-body);
            margin: 0;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: var(--light);
            padding: 25px 15px;
            position: fixed;
            height: 100vh;
            display: flex;
            flex-direction: column;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.03);
            z-index: 1000;
        }

        .sidebar-logo {
            color: #444;
            font-weight: 700;
            font-size: 1.2rem;
            text-align: center;
            margin-bottom: 30px;
            text-decoration: none;
            display: block;
        }

        .nav-menu {
            flex-grow: 1;
            overflow-y: auto;
        }

        .sidebar a {
            color: var(--text-gray);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 5px;
            transition: 0.2s;
            font-size: 0.95rem;
        }

        .sidebar a:hover,
        .sidebar a.active {
            color: var(--primary);
            background: rgba(54, 153, 255, 0.08);
            font-weight: 600;
        }

        /* Content Area */
        .content {
            flex: 1;
            margin-left: 260px;
            padding: 30px 40px;
            min-height: 100vh;
        }

        .custom-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
            height: 100%;
        }

        .welcome-box {
            background: white;
            border-radius: 20px;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .quick-action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px 10px;
            border-radius: 15px;
            color: white !important;
            text-decoration: none;
            transition: all 0.3s ease;
            text-align: center;
            font-weight: 500;
            height: 100%;
        }

        .quick-action-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .logout-container {
            padding-top: 20px;
            border-top: 1px solid #eee;
            margin-top: auto;
        }

        .table-responsive {
            overflow: visible;
        }

        .dropdown-toggle::after { display: none; }

        .logout-container {
            padding-top: 20px;
            border-top: 1px solid #eee;
            margin-top: auto;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <a href="#" class="sidebar-logo">GRAND HORIZON</a>
        <div class="nav-menu">
            <a href="{{ route('admin.dashboard') }}"
                class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class='bx bxs-dashboard'></i> Dashboard
            </a>
            <a href="{{ route('hero.edit') }}" class="{{ request()->routeIs('hero.*') ? 'active' : '' }}">
                <i class='bx bxs-image'></i> Hero Section
            </a>
            <a href="{{ route('tentang.edit') }}" class="{{ request()->routeIs('tentang.*') ? 'active' : '' }}">
                <i class='bx bxs-layout'></i> Tentang
            </a>
            <a href="{{ route('tiperumah.index') }}" class="{{ request()->routeIs('tiperumah.*') ? 'active' : '' }}">
                <i class='bx bxs-home'></i> Tipe Rumah
            </a>
            <a href="{{ route('fasilitas.index') }}" class="{{ request()->routeIs('fasilitas.*') ? 'active' : '' }}">
                <i class='bx bxs-spa'></i> Fasilitas
            </a>
            <a href="{{ route('fasilitasperumahan.index') }}"
                class="{{ request()->routeIs('fasilitasperumahan.*') ? 'active' : '' }}">
                <i class='bx bxs-category'></i> Galeri Perumahan
            </a>
            <a href="{{ route('testimoni.index') }}" class="{{ request()->routeIs('testimoni.*') ? 'active' : '' }}">
                <i class='bx bxs-chat'></i> Testimoni
            </a>
            <a href="{{ route('admin.footer.index') }}"
                class="{{ request()->routeIs('admin.footer*') ? 'active' : '' }}">
                <i class='bx bxs-dock-bottom'></i> Footer
            </a>
            @php $unreadCount = \App\Models\HubungiKami::where('is_read', false)->count(); @endphp
            <a href="{{ route('admin.hubungi-kami.index') }}"
                class="{{ request()->routeIs('admin.hubungi-kami.*') ? 'active' : '' }}">
                📧 Pesan Masuk
                @if($unreadCount > 0)
                    <span class="badge bg-danger ms-1">{{ $unreadCount }}</span>
                @endif
            </a>
        </div>

        <div class="logout-container">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2"
                    style="border-radius: 10px;">
                    <i class='bx bx-log-out'></i> Keluar
                </button>
            </form>
        </div>
    </div>

    <div class="content">
        @if(request()->routeIs('admin.dashboard'))
            <div class="welcome-box shadow-sm">
                <div>
                    <h1 class="fw-bold text-dark mb-1">Halo, {{ Auth::user()->name }}! 👋</h1>
                    <p class="text-muted mb-0">Selamat datang kembali di panel kendali Grand Horizon.</p>
                </div>
                <div class="d-none d-md-block">
                    <img src="https://cdn-icons-png.flaticon.com/512/609/609803.png" width="80" alt="House Icon"
                        style="opacity: 0.8;">
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-lg-4 col-md-5">
                    <div class="custom-card text-center">
                        <h6 class="text-muted text-uppercase fw-bold mb-4">Total Tipe Rumah</h6>
                        <h2 class="display-3 fw-bold text-dark mb-4">{{ $tipeRumahCount ?? '0' }}</h2>
                        <a href="{{ route('tiperumah.index') }}" class="btn btn-primary w-100 rounded-pill py-2">
                            Lihat Unit
                        </a>
                    </div>
                </div>

                <div class="col-lg-8 col-md-7">
                    <div class="custom-card">
                        <h6 class="text-muted text-uppercase fw-bold mb-4">Akses Cepat</h6>
                        <div class="row g-3">
                            <div class="col-4">
                                <a href="{{ route('tiperumah.index') }}" class="quick-action-btn bg-primary">
                                    <i class='bx bx-plus-circle fs-1 mb-2'></i>
                                    <span>Tambah Unit</span>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('fasilitas.index') }}" class="quick-action-btn bg-success">
                                    <i class='bx bx-spa fs-1 mb-2'></i>
                                    <span>Fasilitas</span>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('fasilitasperumahan.index') }}" class="quick-action-btn bg-info">
                                    <i class='bx bx-images fs-1 mb-2'></i>
                                    <span>Galeri Foto</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="custom-card">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0">Testimoni Terbaru</h5>
                    <a href="{{ route('testimoni.index') }}"
                        class="btn btn-sm btn-light border px-3 rounded-pill text-primary fw-bold">Lihat Semua</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 250px;">Nama Customer</th>
                                <th>Pesan Testimoni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($testimonis ?? [] as $t)
                                <tr>
                                    {{-- SESUAIKAN: Pakai $t->user bukan $t->name --}}
                                    <td><span class="fw-semibold text-dark">{{ $t->user }}</span></td>
                                    <td class="text-muted">{{ Str::limit($t->pesan, 100) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted py-5">
                                        <i class='bx bx-comment-x fs-1 opacity-25 d-block mb-2'></i>
                                        Belum ada data testimoni masuk.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        <div class="mt-2">
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>