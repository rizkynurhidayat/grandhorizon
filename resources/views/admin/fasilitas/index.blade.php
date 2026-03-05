<<<<<<< HEAD
@extends('admin.dashboard') 

@section('content')
<div class="container">
    <h2>Daftar Fasilitas Grand Horizon</h2>
    <a href="{{ route('fasilitas.create') }}" class="btn btn-primary mb-3">Tambah Fasilitas</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fasilitas as $f)
            <tr>
                <td>{{ $f->judul }}</td>
                <td>{{ $f->deskripsi }}</td>
                <td><img src="{{ asset('/storage/fasilitas/'.$f->gambar) }}" width="100"></td>
                <td>
                    <form action="{{ route('fasilitas.destroy', $f->id) }}" method="POST">
                        <a href="{{ route('fasilitas.edit', $f->id) }}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
=======
@extends('admin.dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4"> {{-- Tambah margin bottom agar tidak nempel ke tombol bawah --}}
            <div class="card-header">
                <h5 class="mb-0">Data Fasilitas Sekitar</h5>
            </div>

            @if (session('success'))
                <div class="mx-4 mt-2 alert alert-success alert-dismissible" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="ps-4">Judul</th>
                            <th>Gambar/Ikon</th>
                            <th>Deskripsi (List)</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($fasilitas as $f)
                            <tr>
                                <td class="ps-4">{{ $f->judul }}</td>
                                <td>
                                    <div style="width: 50px; height: 50px; overflow: hidden;">
                                        @if ($f->gambar)
                                            <img src="{{ asset('storage/' . $f->gambar) }}" alt="Icon"
                                                style="width: 100%; height: 100%; object-fit: contain;">
                                        @else
                                            <span class="badge bg-label-secondary">No Image</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <ul class="mb-0 ps-3" style="white-space: normal; min-width: 250px;">
                                        @foreach(array_slice(explode("\n", $f->deskripsi), 0, 2) as $line)
                                            @if(trim($line))
                                                <li><small>{{ $line }}</small></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded" style="font-size: 1.2rem;"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end shadow border-0">
                                            <a class="dropdown-item py-2" href="{{ route('fasilitas.edit', $f->id) }}">
                                                <i class="bx bx-edit-alt me-2 text-info"></i> Edit
                                            </a>
                                            <form action="{{ route('fasilitas.destroy', $f->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item py-2 text-danger">
                                                    <i class="bx bx-trash me-2"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- NAVIGASI DI LUAR TABEL (Bersih di kiri) --}}
        <div class="d-flex justify-content-start gap-2">
            <a href="{{ route('fasilitas.create') }}" class="btn btn-primary shadow-sm">
                <i class="bx bx-plus me-1"></i> Tambah Fasilitas
            </a>
        </div>
    </div>

    <style>
        /* Biar dropdown nggak ketutup container tabel */
        .table-responsive {
            overflow: visible !important;
        }

        .table td {
            vertical-align: middle;
        }

        /* Matikan panah dropdown Sneat */
        .hide-arrow::after {
            display: none !important;
        }
    </style>
>>>>>>> ca64be5e9ad65b844b902bac85d3b9f4180f7825
@endsection