@extends('admin.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('tentang.update', $tentang) }}" method="POST" enctype="multipart/form-data">
   
        @csrf
        @method('PUT')

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card mb-4 shadow-sm">
            <h5 class="card-header border-bottom">Edit Konten Utama Tentang Kami</h5>
            <div class="card-body mt-3">
                <div class="mb-3">
                    <label class="form-label fw-bold">Judul Utama</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $tentang->judul) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Subjudul (Paragraf Atas)</label>
                    <input type="text" name="subjudul" class="form-control" value="{{ old('subjudul', $tentang->subjudul) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Deskripsi (Paragraf Bawah)</label>
                    <textarea name="deskripsi" class="form-control" rows="5">{{ old('deskripsi', $tentang->deskripsi) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Teks Tombol</label>
                    <input type="text" name="tekstombol" class="form-control" value="{{ old('tekstombol', $tentang->tekstombol) }}">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Gambar Utama</label>
                        <input type="file" name="gambar" class="form-control mb-2">
                        @if($tentang->gambar)
                            <img src="{{ asset('storage/' . $tentang->gambar) }}" class="rounded shadow-sm border" width="150">
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="mb-0">Edit 4 Keunggulan Grand Horizon</h5>
            </div>
            <div class="card-body mt-3">
                <div class="row">
                    @for ($i = 1; $i <= 4; $i++)
                        @php 
                            $judulUnggulan = "judul_unggulan_$i";
                            $descUnggulan = "desc_unggulan_$i";
                            $logoUnggulan = "logo_unggulan_$i";
                        @endphp
                        <div class="col-md-6 mb-4">
                            <div class="p-3 border rounded bg-light">
                                <h6 class="fw-bold text-primary mb-3"><i class="bx bx-star me-1"></i>Keunggulan {{ $i }}</h6>
                                
                                <div class="mb-3">
                                    <label class="form-label">Logo {{ $i }}</label>
                                    <input type="file" name="logo_unggulan_{{ $i }}" class="form-control mb-2">
                                    @if($tentang->$logoUnggulan)
                                        <div class="bg-dark d-inline-block p-2 rounded mb-2">
                                            <img src="{{ asset('storage/' . $tentang->$logoUnggulan) }}" width="30" height="30" style="object-fit: contain;">
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Judul Keunggulan {{ $i }}</label>
                                    <input type="text" name="judul_unggulan_{{ $i }}" class="form-control" 
                                           value="{{ old($judulUnggulan, $tentang->$judulUnggulan) }}" placeholder="Bebas Banjir">
                                </div>

                                <div class="mb-0">
                                    <label class="form-label">Deskripsi Singkat {{ $i }}</label>
                                    <textarea name="desc_unggulan_{{ $i }}" class="form-control" rows="2">{{ old($descUnggulan, $tentang->$descUnggulan) }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="mt-3 text-center border-top pt-3">
                    <button type="submit" class="btn btn-primary px-4">
                    <i class="bx bx-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection