@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Manajemen Testimoni</h2>
    </div>

    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Form Tambah Testimoni --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4">
            <h5 class="fw-bold mb-3 text-primary">Tambah Testimoni Baru</h5>
            <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Nama Pelanggan</label>
                        <input type="text" name="user" class="form-control" required placeholder="Contoh: Budi Santoso">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Rating (1.0 - 5.0)</label>
                        <input type="number" name="rating" step="0.1" min="1" max="5" class="form-control" placeholder="5.0" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Pesan / Review</label>
                    <textarea name="pesan" class="form-control" rows="3" placeholder="Tulis testimoni pelanggan di sini..." required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Foto Profil</label>
                    <input type="file" name="profile" class="form-control" required>
                    <div class="form-text">Gunakan foto rasio 1:1 agar tampilan maksimal.</div>
                </div>
                <button type="submit" class="btn btn-primary px-5 py-2 rounded-3 shadow-sm">
                    <i class="fas fa-save me-2"></i> Simpan Testimoni
                </button>
            </form>
        </div>
    </div>

    {{-- Tabel Daftar Testimoni --}}
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white py-3">
            <h5 class="fw-bold mb-0">Daftar Testimoni</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4" width="50">No</th>
                            <th>Profil</th>
                            <th>Nama User</th>
                            <th>Rating</th>
                            <th>Pesan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Loop dimulai di sini --}}
                        @forelse($testimonis as $key => $t)
                        <tr>
                            <td class="ps-4 text-muted">{{ $key + 1 }}</td>
                            <td>
                                <img src="{{ asset('assets/img/testimoni/' . $t->profile) }}" 
                                     class="rounded-circle shadow-sm" width="50" height="50" 
                                     style="object-fit: cover; border: 2px solid #eee;">
                            </td>
                            <td><span class="fw-bold text-dark">{{ $t->user }}</span></td>
                            <td>
                                <span class="badge bg-warning text-dark px-3">
                                    <i class="fas fa-star me-1"></i> {{ number_format($t->rating, 1) }}
                                </span>
                            </td>
                            <td><small class="text-muted">{{ Str::limit($t->pesan, 60) }}</small></td>
                            <td class="text-center">
                                <form action="{{ route('testimoni.destroy', $t->id) }}" method="POST">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger border-0">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="80" class="opacity-25 mb-3">
                                <p class="text-muted mb-0">Belum ada testimoni yang ditambahkan.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection