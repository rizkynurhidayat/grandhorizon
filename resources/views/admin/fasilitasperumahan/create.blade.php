@extends('admin.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('fasilitasperumahan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Fasilitas</label>
                    <input type="text" name="nama_fasilitas" class="form-control" placeholder="Contoh: Kolam Renang"
                        required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Upload Gambar Slider</label>
                    <input type="file" name="gambar" class="form-control" required>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" id="formEditFasilitasPerumahan" class="btn btn-primary px-4 shadow-sm">
                        <i class="bx bx-save me-1"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('fasilitasperumahan.index') }}" class="btn btn-outline-secondary px-4">
                        <i class="bx bx-arrow-back me-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files;
            if (file) { preview.src = URL.createObjectURL(file); preview.style.display = 'block'; }
        }
    </script>
@endsection