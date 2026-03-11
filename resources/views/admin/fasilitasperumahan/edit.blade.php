@extends('admin.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Edit Fasilitas</h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('fasilitasperumahan.update', $fasilitasperumahan->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Fasilitas</label>
                    <input type="text" name="nama_fasilitas" class="form-control"
                        value="{{ $fasilitasperumahan->nama_fasilitas }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto (Kosongkan jika tidak ingin ganti)</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                    <small class="text-muted">Maksimal ukuran gambar: 2MB.</small>

                    <div class="mt-3">
                        <small class="text-muted d-block mb-1">Gambar saat ini:</small>
                        <img src="{{ asset('storage/' . $fasilitasperumahan->gambar) }}" width="150"
                            class="rounded border shadow-sm">
                    </div>
                </div>

                <hr>
                <div class="d-flex justify-content-between">
                    <button type="submit" form="formEditFasilitasPerumahan" class="btn btn-primary px-4 shadow-sm">
                        <i class="bx bx-save me-1"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('fasilitasperumahan.index') }}" class="btn btn-outline-secondary px-4">
                        <i class="bx bx-arrow-back me-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection