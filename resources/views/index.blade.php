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


    <!-- hero section -->
    <style>
        /* Tambahkan style ini supaya gambar background bisa berubah dari Admin */
        .hero {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url("{{ asset('assets/img/hero/' . ($hero->gambar ?? 'default-hero.jpg')) }}") !important;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>

    <section class="hero" id="hero">
        <div class="hero-content">
            <h1>{{ $hero->judul ?? 'GRAND HORIZON' }}</h1>

            <h3>{{ $hero->subjudul ?? 'Perumahan Modern dan Nyaman untuk keluarga' }}</h3>

            <p>{!! nl2br(e($hero->alamat ?? 'Jl. Raya Cilegon, Drangong, Taktakan Serang, Kota Serang, Banten 42162')) !!}
            </p>

            <a href="#about">
                <button class="btn-hero">{{ $hero->tekstombol ?? 'Lihat Selengkapnya' }}</button>
            </a>
        </div>
    </section>
    <!-- hero section end -->

    <!-- Selengkapnya grand horizon -->
    <section id="about">
        <h1 class="about-title">{{ $tentang->judul ?? 'Tentang Grand Horizon' }}</h1>

        <div class="about-content">

            <!-- KIRI -->
            <div class="about-image"
                style="background-image: url('{{ asset('storage/' . ($tentang->gambar ?? '')) }}')">
                <div class="about-overlay">
                        {{-- <h2>{{ $tentang->subjudul ?? 'Hunian Nyaman dan Strategis' }}</h2>
                    <p {{ $tentang->subjudul ? 'class="about-subjudul "' : '' }}>
                        Grand Horizon adalah kawasan perumahan modern yang menawarkan hunian nyaman,
                        aman, dan cocok untuk keluarga.
                    </p> --}}
                    {{-- Panggil Subjudul --}}
                         <p class="about-subjudul">
                               {{ $tentang->subjudul ?? 'Grand Horizon adalah kawasan perumahan modern...' }}
                         </p>

                    {{-- <p  {{ $tentang->deskripsi ? 'class="about-description"' : '' }}>
                    <p {{ $tentang->deskripsi ? 'class="about-description"' : '' }}>
                        Berlokasi strategis dan mudah diakses, perumahan ini dekat dengan berbagai
                        fasilitas umum seperti sekolah, pusat perbelanjaan, rumah sakit,
                        dan akses transportasi.
                    </p> --}}
                    {{-- Panggil Deskripsi --}}
                         <p class="about-description">
                               {{ $tentang->deskripsi ?? 'Berlokasi strategis dan mudah diakses...' }}
                        </p>

                    {{-- <button class="btn-selengkapnya" {{ $tentang->tekstombol ? 'data-text="' . $tentang->tekstombol . '"' : '' }}>
                        Lihat selengkapnya
                    </button> --}}
                    {{-- Panggil Teks Tombol --}}
                         <button class="btn-selengkapnya">
                             {{ $tentang->tekstombol ?? 'Lihat selengkapnya' }}
                         </button>
                    <button class="btn-selengkapnya" {{ $tentang->tekstombol ? 'data-text="' . $tentang->tekstombol . '"' : '' }}>
                        Lihat selengkapnya
                    </button>
                </div>
            </div>

            <!-- KANAN -->
            <div class="about-fitur">
                <h4>{{ $tentang->keunggulan_judul ?? '4 Keunggulan Grand Horizon' }}</h4>
                <ul>
        @for ($i = 1; $i <= 4; $i++)
            @php 
                $judul = "judul_unggulan_$i";
                $desc = "desc_unggulan_$i";
                $logo = "logo_unggulan_$i";
            @endphp

            @if($tentang->$judul) {{-- Cek jika judul diisi di admin --}}
            <li>
                <div>
                    {{-- Panggil Logo dari Storage, kalau kosong pakai gambar default --}}
                    <img src="{{ $tentang->$logo ? asset('storage/' . $tentang->$logo) : asset('image/Vector.png') }}">
                    
                    {{-- Panggil Judul --}}
                    <h3>{{ $tentang->$judul }}</h3>
                    
                    {{-- Panggil Deskripsi --}}
                    <p>{{ $tentang->$desc }}</p>
                </div>
            </li>
            @endif
        @endfor
    </ul>
                {{-- <ul>
                    <li>
                        <div>
                            <img src="{{ asset('image/Vector.png') }}" {{ $tentang->logo }}>
                            <h3>Legalitas terjamin</h3>
                            <p>Semua dokumen dan perizinan lengkap serta resmi.</p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="{{ asset('image/tabler_credit-card-filled.png') }}" {{ $tentang->logo }}>
                            <h3>Kredit mudah</h3>
                            <p>Proses pembiayaan mudah dan cicilan terjangkau.</p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="{{ asset('image/Vector (1).png') }}" {{ $tentang->logo }}>
                            <h3>Bebas banjir</h3>
                            <p>Lokasi aman dari genangan dan banjir.</p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="{{ asset('image/Vector (2).png') }}" {{ $tentang->logo }}>
                            <h3>Lokasi mudah diakses</h3>
                            <p>Mudah diakses dan dekat dengan fasilitas umum.</p>
                        </div>
                    </li>
                </ul> --}}
            </div>

        </div>
    </section>
    <!-- Selengkapnya end -->

    <!-- Fasilitas Sekitar -->
    <section id="fasilitas-w">
    <h1>Fasilitas Sekitar Grand Horizon</h1>

    <div class="fasilitas-grid">
        @foreach($fasilitas as $item)
            <div class="fasilitas-item">
                {{-- Gunakan asset storage langsung karena di DB sudah ada kata 'fasilitas/' --}}
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
                
                <h3>{{ $item->judul }}</h3>
                
                <p>
                    {!! nl2br(e($item->deskripsi)) !!}
                </p>
            </div>
        @endforeach
     </div>
</section>
    {{-- <section id="fasilitas-w"> --}}
        {{-- <h1>Fasilitas Sekitar Grand Horizon</h1>

        <div class="fasilitas-grid">
<<<<<<< HEAD
            <section id="fasilitas-w">
    <h1>Fasilitas Sekitar Grand Horizon</h1> --}}

            {{-- <div class="fasilitas-item">
                <img src="{{ asset('image/Vector (3).png') }}" alt="">
                <h3>Akses Jalan</h3>
                <p>
                    GT Serang Timur (6,7 km)<br>
                    GT Serang Barat (1,4 km)<br>
                    Tol Cilegon Timur (12,1 km)
                </p>
            </div> --}}

            {{-- <div class="fasilitas-item">
                <img src="{{ asset('image/picon_office.png') }}" alt="">
                <h3>Kantor Pemerintah</h3>
                <p>
                    Kantor Imigrasi (6 km)<br>
                    SAMSAT MOS (11,4 km)<br>
                    Polsek Serang (3,5 km)
                </p>
            </div> --}}

            {{-- <div class="fasilitas-item">
                <img src="{{ asset('image/Vector (4).png') }}" alt="">
                <h3>Sarana Transportasi</h3>
                <p>
                    Stasiun Serang (4,2 km)<br>
                    Pool Budiman (11,9 km)<br>
                    Terminal Cipocok (6,2 km)
                </p>
            </div> --}}

            {{-- <div class="fasilitas-item">
                <img src="{{ asset('image/Vector.png') }}" alt="">
                <h3>Pasar Tradisional</h3>
                <p>
                    Pasar Induk (5,2 km)<br>
                    Pasar Taman Sari (4,4 km)<br>
                    Pasar Lama (3 km)
                </p>
            </div> --}}

            {{-- <div class="fasilitas-item">
                <img src="{{ asset('image/Vector.svg') }}" alt="">
                <h3>Pusat Belanja Modern</h3>
                <p>
                    Mall of Serang (8,2 km)<br>
                    Lotte Grosir (1,8 km)<br>
                    Transmart (5,8 km)
                </p>
            </div> --}}

            {{-- <div class="fasilitas-item">
                <img src="{{ asset('image/ri_hospital-fill.svg') }}" alt="">
                <h3>Rumah Sakit</h3>
                <p>
                    RSUD Kota Serang (9,7 km)<br>
                    RS Fatimah (850 m)<br>
                    RS Kencana (4,1 km)
                </p>
            </div> --}}

            {{-- <div class="fasilitas-item">
                <img src="{{ asset('image/icon-park-solid_school.svg') }}" alt="">
                <h3>Sekolah</h3>
                <p>
                    SMAN 1 Serang (4,3 km)<br>
                    SMAN 2 Serang (7,7 km)<br>
                    Sekolah Peradaban (4,4 km)
                </p>
            </div> --}}

            {{-- <div class="fasilitas-item">
                <img src="{{ asset('image/ion_school.svg') }}" alt="">
                <h3>Perguruan Tinggi</h3>
                <p>
                    D3 Keperawatan UNTIRTA (1,9 km)<br>
                    Universitas Serang Raya (1,8 km)<br>
                    UPI Kampus Serang (3,9 km)
                </p>
            </div> --}}
{{-- 
            <div class="fasilitas-item">
                <img src="{{ asset('image/icon-park-solid_correct.svg') }}" alt="">
                <h3>Lainnya</h3>
                <p>
                    Waterboom Rancatales (1,2 km)<br>
                    Batu Gede Sayar (8 km)<br>
                    Sagara Lugina (4,9 km)
                </p>
            </div> --}}

=======
            @foreach($fasilitas as $f)
                <div class="fasilitas-item">
                    <img src="{{ asset('storage/' . $f->gambar) }}" alt="{{ $f->judul }}">
                    <h3>{{ $f->judul }}</h3>
                    <p>
                        {!! nl2br(e($f->deskripsi)) !!}
                    </p>
                </div>
            @endforeach
>>>>>>> ca64be5e9ad65b844b902bac85d3b9f4180f7825
        </div>
    </section>

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

        /* Grid Container - Trik Garis Otomatis */
        .fasilitas-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* 3 Kolom */
            gap: 1px;
            /* Celah 1px antara item tetap diatur, tetapi latar belakang akan disembunyikan */
            **background-color: #fff;
            **
            /* Ubah menjadi putih (#fff) */
            **border: 1px solid #fff;
            **
            /* Ubah juga garis luar agar senada */
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Grid Item */
        .fasilitas-item {
            background-color: #fff;
            /* Wajib putih agar menutupi background grid */
            padding: 40px 20px;
            transition: 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .fasilitas-item:hover {
            background-color: #f8f9fa;
            /* Efek hover halus */
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
                        <img src="{{ asset('storage/' . $t->gambar) }}" alt="{{ $t->nama_tipe_rumah }}">
                        <div class="tipe-body">
                            <h2>{{ $t->nama_tipe_rumah }}</h2>
                            <span class="badge">{{ $t->luas_bangunan }}</span>

                            <p class="start">START FROM</p>
                            <p class="price">{{ $t->harga }}</p>

                            <span class="cicilan">{{ $t->cicilan }}</span>

                            <div class="tipe-info">
                                {{-- Angka diambil dari DB, teks tetap statis sesuai request --}}
                                <div>🛏 {{ $t->kamar_tidur }} Bedrooms</div>
                                <div>🚿 {{ $t->kamar_mandi }} Bathroom</div>
                                <div>🚗 {{ $t->garasi }} Carport</div>
                            </div>

                            <button class="btn-unit">{{ $t->tekstombol }}</button>
                        </div>
                    </div>
                @endforeach
                {{-- --- END BAGIAN DINAMIS --- --}}


                {{-- --- BAGIAN STATIS (TETAP DI SINI) --- --}}
                <div class="tipe-card">
                    <img src="{{ asset('image/Rectangle 101.png') }}" alt="Tipe Lite">
                    <div class="tipe-body">
                        <h2>Tipe Horizon Lite</h2>
                        <span class="badge">LT 40m LB 60m</span>
                        <p class="start">START FROM</p>
                        <p class="price">Rp900 Juta – Rp1,2 Miliar</p>
                        <span class="cicilan">Cicilan mulai 3,0 JT-an</span>
                        <div class="tipe-info">
                            <div>🛏 2 Bedrooms</div>
                            <div>🚿 1 Bathroom</div>
                            <div>🚗 1 Carport</div>
                        </div>
                        <button class="btn-unit">CEK KETERSEDIAAN UNIT</button>
                    </div>
                </div>

                <div class="tipe-card">
                    <img src="{{ asset('image/Rectangle 101 (1).png') }}" alt="Tipe Smart">
                    <div class="tipe-body">
                        <h2>Tipe Horizon Smart</h2>
                        <span class="badge">LT 40m LB 60m</span>
                        <p class="start">START FROM</p>
                        <p class="price">Rp1,2 Miliar – 1,8 Miliar</p>
                        <span class="cicilan">Cicilan mulai 3,0 JT-an</span>
                        <div class="tipe-info">
                            <div>🛏 2 Bedrooms</div>
                            <div>🚿 2 Bathroom</div>
                            <div>🚗 1 Carport</div>
                        </div>
                        <button class="btn-unit">CEK KETERSEDIAAN UNIT</button>
                    </div>
                </div>

                <div class="tipe-card">
                    <img src="{{ asset('image/Rectangle 101 (2).png') }}" alt="Tipe Prime">
                    <div class="tipe-body">
                        <h2>Tipe Horizon Prime</h2>
                        <span class="badge">LT 40m LB 60m</span>
                        <p class="start">START FROM</p>
                        <p class="price">Rp1,8 Miliar – Rp2,7 Miliar</p>
                        <span class="cicilan">Cicilan mulai 3,0 JT-an</span>
                        <div class="tipe-info">
                            <div>🛏 3 Bedrooms</div>
                            <div>🚿 2 Bathroom</div>
                            <div>🚗 1 Carport</div>
                        </div>
                        <button class="btn-unit">CEK KETERSEDIAAN UNIT</button>
                    </div>
                </div>

                <div class="tipe-card">
                    <img src="{{ asset('image/Rectangle 101 (3).png') }}" alt="Tipe Signature">
                    <div class="tipe-body">
                        <h2>Tipe Horizon Signature</h2>
                        <span class="badge">LT 40m LB 60m</span>
                        <p class="start">START FROM</p>
                        <p class="price">Rp2,8 Miliar – Rp4 Miliar</p>
                        <span class="cicilan">Cicilan mulai 3,0 JT-an</span>
                        <div class="tipe-info">
                            <div>🛏 4 Bedrooms</div>
                            <div>🚿 3 Bathroom</div>
                            <div>🚗 2 Carport</div>
                        </div>
                        <button class="btn-unit">CEK KETERSEDIAAN UNIT</button>
                    </div>
                </div>
                {{-- --- END BAGIAN STATIS --- --}}

            </div>
        </div>
    </section>
    <!-- Tipe rumah end -->

    <!-- Fasilitas perumahan -->
    <section id="fas-perumahan" class="fasilitas-perumahan">
        <h1>Fasilitas Perumahan</h1>

        <div class="slider">
            <button class="nav prev">&#10094;</button>

            <div class="slider-wrapper"> <!--go jendela-->
                <div class="slider-track"> <!--gambar jejeran ke samping-->
                    <img src="{{ asset('image/Rectangle 73.png') }}" alt="gambar cctv">
                    <img src="{{ asset('image/Rectangle 73 (1).png') }}" alt="gambar ruang tv">
                    <img src="{{ asset('image/Rectangle 73 (2).png') }}" alt="gambar taman hijau">
                </div>
            </div>

            <button class="nav next">&#10095;</button>
        </div>

        <div class="dots"> <!-- go indikator slide pas murub/aktif-->
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </section>
    <!-- Fasilitas perumahan end -->


    <!-- Testimoni klien -->
    <section id="testi-klien">
        <h1>Testimoni Klien</h1>
        <div class="testi-grid">
            <div class="testi-card">
                <h5 class="rating">
                    <span class="score">4.9</span> <!--wadah kecil untuk teks-->
                    <span class="stars">★★★★★</span>
                </h5>
                <p class="testi-text">
                    “Grand Horizon adalah tempat tinggal yang nyaman dan tenang.
                    Lingkungannya rapi, aman, dan cocok untuk keluarga.”
                </p>
                <p class="testi-name">Saipul jamil</p>
            </div>

            <div class="testi-card">
                <h5 class="rating">
                    <span class="score">4.9</span>
                    <span class="stars">★★★★★</span>
                </h5>
                <p class="testi-text">
                    “Lokasinya strategis, akses mudah, dan fasilitasnya lengkap.
                    Sangat recommended.”
                </p>
                <p class="testi-name">Lamine Yamal</p>
            </div>

            <div class="testi-card">
                <h5 class="rating">
                    <span class="score">4.9</span>
                    <span class="stars">★★★★★</span>
                </h5>
                <p class="testi-text">
                    “Lingkungan bersih dan aman. Anak-anak nyaman bermain.”
                </p>
                <p class="testi-name">Cristiano Ronaldo</p>
            </div>

            <div class="testi-card">
                <h5 class="rating">
                    <span class="score">4.9</span>
                    <span class="stars">★★★★★</span>
                </h5>
                <p class="testi-text">
                    “Pelayanan pengembangnya cepat dan responsif.”
                </p>
                <p class="testi-name">Lionel Messi</p>
            </div>

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
        <h1>Lokasi Grand Horizon</h1>
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

    <!-- section footer -->
    <footer class="footer">
        <div class="footer-container">

            <!-- Judul -->
            <h1 class="footer-title">Biaya Pemesanan Mulai 3 Juta</h1>

            <!-- Keunggulan -->

            <ul class="footer-benefit">
                <li>
                    <img src="{{ asset('image/subway_tick (1).png') }}" class="icon-putih">
                    Cicilan ringan
                </li>
                <li>

                    <img src="{{ asset('image/subway_tick (1).png') }}" class="icon-putih">
                    GRATIS 1 unit AC
                </li>
                <li>
                    <img src="{{ asset('image/subway_tick (1).png') }}" class="icon-putih">
                    Hadiah menarik lainnya GRATIS
                </li>
                <li>
                    <img src="{{ asset('image/subway_tick (1).png') }}" class="icon-putih">
                    PPN GRATIS
                </li>
                <li>
                    <img src="{{ asset('image/subway_tick (1).png') }}" class="icon-putih">
                    KPR GRATIS
                </li>
                <li>
                    <img src="{{ asset('image/subway_tick (1).png') }}" class="icon-putih">
                    DP GRATIS
                </li>
                <li>
                    <img src="{{ asset('image/subway_tick (1).png') }}" class="icon-putih">
                    GRATIS biaya surat-surat
                </li>
            </ul>

            <!-- Tombol WhatsApp -->
            <a href="https://wa.me/6282146273679" class="footer-button" target="_blank">
                <img src="{{ asset('image/wa.png') }}" alt="">
                Hubungi kami sekarang juga
            </a>

            <hr>

            <!-- Kontak & Sosial Media -->
            <ul class="footer-contact">
                <li>
                    <img src="{{ asset('image/maps.png') }}" alt="">
                    <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Raya+Cilegon,+Serang"
                        target="_blank">Jl. Raya Cilegon, Serang</a>
                </li>
                <li>
                    <img src="{{ asset('image/mdi_call.png') }}" alt="">
                    <a href="tel:082146273679">0821-4627-3679</a>
                </li>
                <li>
                    <img src="{{ asset('image/gmail.png') }}" alt="">
                    <a href="mailto:Horizon123@gmail.com">Horizon123@gmail.com</a>
                </li>
                <li>
                    <img src="{{ asset('image/fb.png') }}" alt="">
                    <a href="https://www.facebook.com/grandhorizon">Grand Horizon</a>
                </li>
                <li>
                    <img src="{{ asset('image/twit.png') }}" alt="">
                    <a href="https://twitter.com/grandhorizon">Grand Horizon</a>
                </li>
                <li>
                    <img src="{{ asset('image/ig.png') }} " alt="">
                    <a href="https://www.instagram.com/grandhorizon">Grand Horizon</a>
                </li>
            </ul>
        </div>
    </footer>

    <!-- Copyright -->
    <div class="footer-copyright">
        © 2025 GRAND HORIZON
    </div>

    <!-- section footer end-->
</body>

<script src="{{ asset('js/scripts.js') }}"></script>

</html>