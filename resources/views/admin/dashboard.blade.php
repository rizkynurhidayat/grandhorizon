<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Grand Horizon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #343a40;
            color: white;
            padding: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .content {
            flex: 1;
            padding: 30px;
            background: #f8f9fa;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h4>Grand Horizon</h4>
        <hr>
        <a href="{{ route('admin.dashboard') }}">🏠 Dashboard</a>
        <a href="{{ route('hero.edit') }}">🖼️ Hero Section</a>
        <a href="{{ route('tentang.index') }}">ℹ️ Tentang</a>
        <a href="#">🏢 Tipe Rumah</a>
        <a href="#">🌟 Fasilitas</a>
        <a href="#">📸 Galeri Perumahan</a>
        <a href="#">💬 Testimoni</a>
        <a href="{{ route('admin.hubungi-kami.index') }}">📧 Pesan Masuk</a>
        <a href="#">📞 Profile & Footer</a>
        <hr>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger w-100">Keluar</button>
        </form>
    </div>

    <div class="content">
        {{-- Bagian ini adalah 'lubang' tempat masuknya isi dari file lain (seperti edit.blade.php) --}}
        @hasSection('content')
            @yield('content')
        @else
            {{-- Ini tampilan default kalau kamu baru login (Dashboard utama) --}}
            <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p>Gunakan menu di samping untuk mengelola konten website Grand Horizon.</p>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card bg-primary text-white p-3">
                        <h5>Total Tipe Rumah</h5>
                        <h3>8 Unit</h3>
                    </div>
                </div>
            </div>
        @endif
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>