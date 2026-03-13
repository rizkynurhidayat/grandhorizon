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
            --sidebar-width: 260px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-body);
            margin: 0;
            overflow-x: hidden;
        }

        /* --- SIDEBAR RESPONSIVE --- */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--light);
            padding: 25px 15px;
            position: fixed;
            height: 100vh;
            display: flex;
            flex-direction: column;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.03);
            z-index: 1050;
            transition: all 0.3s ease;
        }

        /* --- CONTENT AREA RESPONSIVE --- */
        .content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 30px 40px;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* Navbar Mobile */
        .mobile-nav {
            display: none;
            background: var(--light);
            padding: 15px 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 1040;
        }

        /* --- MEDIA QUERIES UNTUK HP (MAX 991px) --- */
        @media (max-width: 991px) {
            .sidebar {
                left: calc(var(--sidebar-width) * -1);
                /* Sembunyikan sidebar ke kiri */
            }

            .sidebar.active {
                left: 0;
                /* Munculkan saat tombol di-klik */
            }

            .content {
                margin-left: 0;
                padding: 20px 15px;
            }

            .mobile-nav {
                display: flex !important;
                /* Pastikan muncul sebagai flex */
                flex-direction: row !important;
                /* Paksa tetap ke samping */
                justify-content: space-between !important;
                align-items: center !important;
            }

            /* Overlay saat sidebar muncul */
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.4);
                z-index: 1045;
            }

            .sidebar-overlay.active {
                display: block;
            }
        }

        /* Styling Tambahan agar rapi */
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
            padding: 25px;
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
            padding: 15px 5px;
            border-radius: 15px;
            color: white !important;
            text-decoration: none;
            transition: all 0.3s ease;
            text-align: center;
            font-weight: 500;
            height: 100%;
            font-size: 0.8rem;
        }

        .quick-action-btn i {
            font-size: 1.5rem !important;
        }

        .logout-container {
            padding-top: 20px;
            border-top: 1px solid #eee;
            margin-top: auto;
        }

        /* Fix Tabel Meluber di HP */
        .table-responsive {
            border: 0;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
    </style>
</head>

<body>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="mobile-nav shadow-sm">
        <span class="fw-bold">GRAND HORIZON</span>
        <button class="btn btn-primary btn-sm" id="toggleSidebar">
            <i class='bx bx-menu fs-4'></i>
        </button>
    </div>

    <div class="sidebar" id="sidebar">
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
                <i class='bx bxs-envelope'></i> Pesan @if($unreadCount > 0) <span
                class="badge bg-danger ms-1">{{ $unreadCount }}</span> @endif
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
                <div class="pe-3">
                    <h1 class="fw-bold text-dark mb-1 fs-4">Halo, {{ Auth::user()->name }}! 👋</h1>
                    <p class="text-muted mb-0 small">Selamat datang di Grand Horizon.</p>
                </div>
                <div class="d-none d-sm-block">
                    <img src="https://cdn-icons-png.flaticon.com/512/609/609803.png" width="60" alt="House Icon"
                        style="opacity: 0.8;">
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-lg-4 col-12">
                    <div class="custom-card text-center">
                        <h6 class="text-muted text-uppercase small fw-bold mb-3">Total Tipe Rumah</h6>
                        <h2 class="fw-bold text-dark mb-3">{{ $tipeRumahCount ?? '0' }}</h2>
                        <a href="{{ route('tiperumah.index') }}" class="btn btn-primary w-100 rounded-pill py-2 btn-sm">
                            Lihat Unit
                        </a>
                    </div>
                </div>

                <div class="col-lg-8 col-12">
                    <div class="custom-card">
                        <h6 class="text-muted text-uppercase small fw-bold mb-3">Akses Cepat</h6>
                        <div class="row g-2">
                            <div class="col-4">
                                <a href="{{ route('tiperumah.index') }}" class="quick-action-btn bg-primary">
                                    <i class='bx bx-plus-circle mb-1'></i>
                                    <span>Tipe</span>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('fasilitas.index') }}" class="quick-action-btn bg-success">
                                    <i class='bx bx-spa mb-1'></i>
                                    <span>Fasilitas</span>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('fasilitasperumahan.index') }}" class="quick-action-btn bg-info">
                                    <i class='bx bx-images mb-1'></i>
                                    <span>Galeri</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="custom-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-bold mb-0">Testimoni Terbaru</h6>
                    <a href="{{ route('testimoni.index') }}" class="text-primary small fw-bold text-decoration-none">Lihat
                        Semua</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle" style="min-width: 400px;">
                        <thead class="table-light">
                            <tr class="small">
                                <th>Customer</th>
                                <th>Pesan</th>
                            </tr>
                        </thead>
                        <tbody class="small">
                            @forelse($testimonis ?? [] as $t)
                                <tr>
                                    <td><span class="fw-semibold text-dark">{{ $t->user }}</span></td>
                                    <td class="text-muted">{{ Str::limit($t->pesan, 50) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted py-4">Belum ada data.</td>
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
    <script>
        // Script untuk Toggle Sidebar di Mobile
        $(document).ready(function () {
            $('#toggleSidebar, #sidebarOverlay').on('click', function () {
                $('#sidebar').toggleClass('active');
                $('#sidebarOverlay').toggleClass('active');
            });
        });
    </script>
</body>

</html>