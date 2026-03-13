@use('Illuminate\Support\Facades\Storage')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar HTML</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="#hero">
            <img src="{{ asset('image/image 7.svg') }}" alt="Logo Grand Horizon" class="logo">
        </a>

        <ul class="nav-links">
            <li><a href="#about">Tentang Kami</a></li>
            <li><a href="#fasilitas-w">Fasilitas Sekitar</a></li>
            <li><a href="#tipe-rmh">Tipe Rumah</a></li>
            <li><a href="#fas-perumahan">Fasilitas Perumahan</a></li>
            <li><a href="#testi-klien">Testimoni Klien</a></li>
        </ul>

        <a href="#contact">
            <button class="btn-nav">Hubungi Kami</button>
        </a>

        <!-- MENU ICON MOBILE -->
        <div class="menu-icon" onclick="openMenu()">☰</div>
    </nav>

    <!-- NAVBAR MOBILE -->
    <nav id="mobile-nav" class="mobile-nav">
        <div class="close-menu" onclick="closeMenu()">✕</div>

        <ul class="mobile-links">
            <li><a href="#about" onclick="closeMenu()">Tentang Kami</a></li>
            <li><a href="#fasilitas-w" onclick="closeMenu()">Fasilitas Sekitar</a></li>
            <li><a href="#tipe-rmh" onclick="closeMenu()">Tipe Rumah</a></li>
            <li><a href="#fas-perumahan" onclick="closeMenu()">Fasilitas Perumahan</a></li>
            <li><a href="#testi-klien" onclick="closeMenu()">Testimoni Klien</a></li>
        </ul>
    </nav>

    <script>
        const menu = document.getElementById('mobile-nav');

        function openMenu() {
            menu.style.display = 'block';
        }

        function closeMenu() {
            menu.style.display = 'none';
        }
    </script>


    <style>
        .hero {
            /* Gradasi Mewah: Kiri gelap pekat (buat teks), kanan bening transparan (buat pamer rumah) */
            background-image: linear-gradient(to right, rgba(15, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.6) 45%, rgba(15, 23, 42, 0) 100%),
            url("{{ $hero->gambar && $hero->gambar !== 'default.jpg' ? Storage::url($hero->gambar) : 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=2075&auto=format&fit=crop' }}") !important;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            /* Teks tetap di tengah secara vertikal */
        }
    </style>

    <section class="hero" id="hero">
        <div class="hero-container">
            <div class="hero-content">
                <span class="hero-badge">Exclusive Residence</span>
                <h1>{{ $hero->judul ?? 'GRAND HORIZON' }}</h1>
                <h3>{{ $hero->subjudul ?? 'Perumahan Modern dan Nyaman untuk keluarga' }}</h3>

                <p class="hero-address">
                    <i class='bx bx-map' style="font-size: 20px; color: #d4af37; margin-top: 3px;"></i>
                    <span>{!! nl2br(e($hero->alamat ?? 'Jl. Raya Cilegon, Drangong, Taktakan Serang, Kota Serang, Banten
                        42162')) !!}</span>
                </p>

                <div class="hero-actions">
                    <a href="#about" style="text-decoration: none;">
                        <button class="btn-hero">{{ $hero->tekstombol ?? 'Lihat Selengkapnya' }}</button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="container-luxury">
            <h1 class="about-title">{{ $tentang->judul ?? 'Tentang Grand Horizon' }}</h1>
            <div class="title-line"></div>
        </div>

        <div class="about-content">
            <div class="about-image"
                style="background-image: url('{{ asset('storage/' . ($tentang->gambar ?? '')) }}')">
                <div class="about-overlay">
                    <span class="about-tag">Premium Quality</span>
                    <p class="about-subjudul">
                        {{ $tentang->subjudul ?? 'Grand Horizon adalah kawasan perumahan modern yang menawarkan hunian
                        nyaman, aman, dan cocok untuk keluarga.' }}
                    </p>

                    <p class="about-description">
                        {{ $tentang->deskripsi ?? 'Berlokasi strategis dan mudah diakses, perumahan ini dekat dengan
                        berbagai fasilitas umum seperti sekolah, pusat perbelanjaan, rumah sakit, dan akses
                        transportasi.' }}
                    </p>

                    <a href="#fasilitas-w" class="btn-selengkapnya-luxury">
                        {{ $tentang->tekstombol ?? 'Jelajahi Sekarang' }}
                    </a>
                </div>
            </div>

            <div class="about-fitur">
                <div class="fitur-header">
                    <h4>{{ $tentang->keunggulan_judul ?? '4 Keunggulan Utama' }}</h4>
                </div>

                <ul class="fitur-list">
                    @for ($i = 1; $i <= 4; $i++) @php $judul="judul_unggulan_$i" ; $desc="desc_unggulan_$i" ;
                        $logo="logo_unggulan_$i" ; @endphp @if($tentang->$judul)
                        <li>
                            <div class="fitur-card">
                                <div class="fitur-icon-box">
                                    <img src="{{ $tentang->$logo ? asset('storage/' . $tentang->$logo) : asset('image/Vector.png') }}"
                                        alt="icon">
                                </div>
                                <div class="fitur-text">
                                    <h3>{{ $tentang->$judul }}</h3>
                                    <p>{{ $tentang->$desc }}</p>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endfor
                </ul>
            </div>
        </div>
    </section>

    <!-- Fasilitas Sekitar -->
    @if($fasilitas->count() > 0)
    <section id="fasilitas-w">
        <h1 class="judul-fasilitas">Fasilitas Sekitar Grand Horizon</h1>

        <div class="fasilitas-grid">
            @foreach($fasilitas as $item)
            <div class="fasilitas-item">
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
                {{-- <img
                    src="{{ $Fasilitas && $Fasilitas->gambar? asset('storage/' . $Fasilitas->gambar) : asset('public/image/Vector(4).png') }}"
                    alt="Logo"> --}}
                <h3>{{ $item->judul }}</h3>
                <p>{!! nl2br(e($item->deskripsi)) !!}</p>
            </div>
            @endforeach
        </div>
    </section>
    @endif



    <style>
        /* Section Container */
        #fasilitas-w {
            padding: 60px 20px;
            text-align: center;
            background-color: #fff;
        }

        #fasilitas-w h1 {
            margin-bottom: 40px;
            font-weight: bold;
        }

        /* Grid Container - Hapus Border & Background di sini */
        .fasilitas-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0;
            /* Gap diubah jadi 0 agar border antar item menyatu */
            max-width: 1200px;
            margin: 0 auto;
            border: none;
            /* Pastikan tidak ada border di container utama */
        }

        /* Grid Item - Tambahkan Border di sini */
        .fasilitas-item {
            background-color: #fff;
            padding: 40px 20px;
            transition: 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;

            /* Tambahkan border di tiap item */
            border: 1px solid #ddd;
            /* Gunakan margin negatif agar garis tidak double saat bertemu item lain */
            margin-left: -1px;
            margin-top: -1px;
        }

        .fasilitas-item:hover {
            background-color: #f8f9fa;
            z-index: 1;
            /* Agar border hover tetap terlihat di atas */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .fasilitas-item img {
            height: 60px;
            margin-bottom: 20px;
            object-fit: contain;
        }

        .fasilitas-item h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .fasilitas-item p {
            font-size: 0.95rem;
            color: #6c757d;
            line-height: 1.6;
            margin: 0;
        }

        /* Responsive untuk Tablet dan HP */
        @media (max-width: 992px) {
            .fasilitas-grid {
                grid-template-columns: repeat(2, 1fr);
                /* 2 Kolom di tablet */
            }
        }

        @media (max-width: 576px) {
            .fasilitas-grid {
                grid-template-columns: 1fr;
                /* 1 Kolom di HP */
            }
        }
    </style>
    <!-- Fasilitas Sekitar End -->


    <!-- Tipe rumah -->
    <section id="tipe-rmh" class="tipe-rumah">
        <div class="tipe-container">

            <div class="tipe-header">
                <h1>Tipe Rumah</h1>
                <p>
                    Grand Horizon menawarkan beragam tipe rumah yang dirancang untuk memenuhi kebutuhan keluarga,
                    mulai dari hunian yang fungsional hingga rumah yang lebih luas dan nyaman.
                </p>
            </div>

            <div class="tipe-grid">

                {{-- --- BAGIAN DINAMIS (DARI DATABASE) --- --}}
                @foreach($tiperumah as $t)
                <div class="tipe-card">
                    <img src="{{ $t->gambar ? asset('storage/' . $t->gambar) : asset('image/bg_tiperumah.png') }}"
                        alt="{{ $t->nama_tipe_rumah }}">

                    <div class="tipe-body">
                        <h2>{{ $t->nama_tipe_rumah }}</h2>
                        <span class="badge">{{ $t->luas_bangunan }} m²</span>

                        <p class="start">START FROM</p>
                        <p class="price">{{ $t->harga }}</p>

                        <span class="cicilan">Cicilan {{ $t->cicilan }}</span>

                        <div class="tipe-info">
                            <div>🛏 {{ $t->kamar_tidur }} Bedrooms</div>
                            <div>🚿 {{ $t->kamar_mandi }} Bathroom</div>
                            <div>🚗 {{ $t->garasi }} Carport</div>
                        </div>

                        {{-- Tombol harus di dalam tipe-body agar rapi --}}
                        <button class="btn-unit"
                            onclick="window.open('https://wa.me/{{ preg_replace('/[^0-9]/', '', $f->phone ?? '6282146273679') }}', '_blank')">
                            {{ $t->tekstombol ?? 'CEK KETERSEDIAAN UNIT' }}
                        </button>
                    </div>
                </div>
                @endforeach
                {{-- --- END BAGIAN DINAMIS --- --}}



            </div>
        </div>
    </section>
    <!-- Tipe rumah end -->

    <section id="fas-perumahan" class="fasilitas-perumahan reveal">
        <h1 class="judul-perumahan">Fasilitas Perumahan</h1>
        <div class="slider">
            <button class="nav prev">&#10094;</button>
            <div class="slider-wrapper">
                <div class="slider-track">
                    <img src="{{ asset('image/Rectangle 73.png') }}" alt="statik 1">
                    <img src="{{ asset('image/Rectangle 73 (1).png') }}" alt="statik 2">
                    <img src="{{ asset('image/Rectangle 73 (2).png') }}" alt="statik 3">
                    @foreach($fasilitasperumahan as $fp)
                    <img src="{{ asset('storage/' . $fp->gambar) }}" alt="Fasilitas">
                    @endforeach
                </div>
            </div>
            <button class="nav next">&#10095;</button>
        </div>
        <div class="dots" id="dots-container">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            @foreach($fasilitasperumahan as $fp)
            <span class="dot"></span>
            @endforeach
        </div>
    </section>


    <!-- Testimoni klien -->
    <section id="testi-klien">
        <h1 class="testi-title">Testimoni Klien</h1>

        <div class="testi-grid-figma">
            @forelse($testimonis as $t)
            <div class="testi-card-figma">
                {{-- Rating Pojok Kanan Atas --}}
                <div class="testi-rating-figma">
                    {{ number_format($t->rating, 1) }} <i class="fa-solid fa-star"></i>
                </div>

                {{-- Isi Pesan --}}
                <p class="testi-desc-figma">
                    “{{ $t->pesan }}”
                </p>

                {{-- Footer: Foto & Nama --}}
                <div class="testi-footer-figma">
                    <img src="{{ asset('assets/img/testimoni/' . $t->profile) }}" alt="{{ $t->user }}">
                    <span class="testi-username-figma">{{ strtoupper($t->user) }}</span>
                </div>
            </div>
            @empty
            <div class="testi-empty">
                <p>Belum ada testimoni klien saat ini.</p>
            </div>
            @endforelse
        </div>
    </section>
    <!-- Testimoni klien end -->

    <section class="contact" id="contact">
        <h1 class="contact-title">Hubungi Kami</h1>

        <div class="contact-box">
            @if(session('success_pesan'))
            <div
                style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center; border: 1px solid #c3e6cb;">
                {{ session('success_pesan') }}
            </div>
            @endif

            <form class="contact-form" action="{{ route('hubungi-kami.store') }}" method="POST" id="contactForm">
                @csrf {{-- Wajib ada di dalam form Laravel --}}
                @if ($errors->any())
                <div
                    style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 10px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Atribut 'name' disesuaikan dengan database: user, no_hp, email, tanggal, pesan --}}
                <input type="text" name="user" id="nama" placeholder="Nama" required value="{{ old('user') }}">
                <input type="text" name="no_hp" id="hp" placeholder="Nomor HP" required value="{{ old('no_hp') }}">

                <input type="email" name="email" id="email" placeholder="Email" required value="{{ old('email') }}">
                <input type="date" name="tanggal" id="jadwal" required value="{{ old('tanggal') }}">

                <textarea name="pesan" id="pesan" placeholder="Pesan yang ingin disampaikan"
                    required>{{ old('pesan') }}</textarea>

                <button type="submit">Jadwalkan Kunjungan</button>
            </form>
        </div>
    </section>
    <!-- Hubungi kami end -->

    <!-- Lokasi grand horizon -->
    <section class="location">
        <h1 class="judul-lokasi">Lokasi Grand Horizon</h1>
        <div class="location-g">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3187046901853!2d106.63016337399!3d-6.221639493766382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f955a6453ead%3A0x4c7b660d033cf2a2!2sGrand%20Serpong%20Hotel!5e0!3m2!1sid!2sid!4v1767941091642!5m2!1sid!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="location-p">
                <p>Alamat Grand Horizon : Jl. Raya Cilegon, Drangong, Taktakan Serang, Kota Serang, Banten 42162</p>
                <p>Penghuni perumahan Grand Horizon lebih mudah mengatur perjalanan menuju Cilegon dan Jakarta. Cluster
                    perumahan ini hanya 5 menit ke Gerbang Tol Serang Barat.</p>
                <p>Rumah sakit terdekat yang dapat diakses penghuni ialah RS Fatimah di Jl. Raya Serang Cilegon KM 3,5.
                    Jarak dari Serang City hanya 850 meter.</p>
            </div>
        </div>
    </section>
    <!-- Lokasi grand horizon end-->

    @php
    $f = App\Models\Footer::getActive() ?? App\Models\Footer::latest()->first();
    @endphp

    @if($f)
    <footer class="footer-luxury">
        {{-- BAGIAN ATAS: CTA & BENEFIT --}}
        <section class="footer-cta-section">
            <div class="container-luxury">
                <h1 class="footer-offer-title">{{ $f->biaya_judul ?? 'Biaya Pemesanan Mulai 3 Juta' }}</h1>
                <div class="footer-gold-line"></div>

                <div class="footer-benefit-grid">
                    @if(is_array($f->biaya_items) || is_object($f->biaya_items))
                    @foreach($f->biaya_items as $item)
                    <div class="benefit-item">
                        <div class="icon-circle">
                            <img src="{{ asset('image/subway_tick (1).png') }}" class="icon-gold">
                        </div>
                        <span>{{ $item }}</span>
                    </div>
                    @endforeach
                    @else
                    {{-- Fallback jika array kosong --}}
                    <div class="benefit-item">
                        <div class="icon-circle"><img src="{{ asset('image/subway_tick (1).png') }}" class="icon-gold">
                        </div>
                        <span>Cicilan Ringan</span>
                    </div>
                    <div class="benefit-item">
                        <div class="icon-circle"><img src="{{ asset('image/subway_tick (1).png') }}" class="icon-gold">
                        </div>
                        <span>Gratis AC & PPN</span>
                    </div>
                    @endif
                </div>

                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $f->phone ?? '6282146273679') }}"
                    class="btn-wa-luxury" target="_blank">
                    <img src="{{ asset('image/wa.png') }}" alt="WA">
                    Hubungi kami sekarang juga
                </a>
            </div>
        </section>

        {{-- BAGIAN BAWAH: INFO KONTAK (HORIZONTAL) --}}
        <section class="footer-info-section">
            <div class="container-luxury">

                {{-- Brand Centered --}}
                <div class="footer-brand-horizontal">
                    <div class="brand-name">GRAND <span>HORIZON</span></div>
                    <p class="brand-tagline">Hunian modern dengan konsep eksklusif untuk kenyamanan keluarga Anda di
                        lokasi strategis.</p>
                </div>

                <hr class="footer-divider">

                {{-- Kontak Horizontal --}}
                <div class="footer-contact-row">
                    <a href="https://www.google.com/maps/search/{{ urlencode($f->address) }}" target="_blank"
                        class="contact-item">
                        <img src="{{ asset('image/maps.png') }}" class="contact-icon" alt="Lokasi">
                        <span>{{ $f->address ?? 'Alamat belum diatur' }}</span>
                    </a>

                    <a href="tel:{{ $f->phone }}" class="contact-item">
                        <img src="{{ asset('image/mdi_call.png') }}" class="contact-icon" alt="Telepon">
                        <span>{{ $f->phone ?? '-' }}</span>
                    </a>

                    <a href="mailto:{{ $f->email }}" class="contact-item">
                        <img src="{{ asset('image/gmail.png') }}" class="contact-icon" alt="Email">
                        <span>{{ $f->email ?? '-' }}</span>
                    </a>
                </div>

                {{-- Sosmed Horizontal --}}
                <div class="footer-social-row">
                    @if($f->fb_url)
                    <a href="{{ $f->fb_url }}" class="social-item" target="_blank">
                        <img src="{{ asset('image/fb.png') }}" alt="FB">
                        <span>Grand Horizon</span>
                    </a>
                    @endif

                    @if($f->ig_url)
                    <a href="{{ $f->ig_url }}" class="social-item" target="_blank">
                        <img src="{{ asset('image/ig.png') }}" alt="IG">
                        <span>Grand Horizon</span>
                    </a>
                    @endif
                </div>

            </div>
        </section>

        {{-- BAGIAN COPYRIGHT (Blok Putih Cerah) --}}
        <div class="footer-copyright-bar">
            <div class="container-luxury">
                {{ $f->copyright ?? '© ' . date('Y') . ' GRAND HORIZON' }}
            </div>
        </div>
        @endif

        <script src="{{ asset('js/scriprts.js') }}"></script>
</body>

</html>