@extends('admin.dashboard')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Edit Footer</h2>
        <a href="{{ route('admin.footer.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <form action="{{ route('admin.footer.update', $footer) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- BAGIAN 1: BIAYA PEMESANAN --}}
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body p-4">
                <h5 class="fw-bold text-primary mb-4">
                    <i class="fas fa-tag me-2"></i>Biaya Pemesanan
                </h5>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Section</label>
                    <input type="text" name="biaya_judul" class="form-control"
                        placeholder="Biaya Pemesanan Mulai 3 Juta"
                        value="{{ old('biaya_judul', $footer->biaya_judul) }}">
                </div>
                <label class="form-label fw-semibold">
                    Item Keuntungan <small class="text-muted">(centang-centang)</small>
                </label>
                <div id="biayaItemsContainer">
                    @foreach(old('biaya_items', $footer->biaya_items ?? []) as $item)
                    <div class="input-group mb-2 biaya-item-row">
                        <span class="input-group-text bg-success text-white">✔</span>
                        <input type="text" name="biaya_items[]" class="form-control"
                            placeholder="Contoh: Cicilan ringan" value="{{ $item }}">
                        <button type="button" class="btn btn-outline-danger" onclick="removeItem(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-outline-success btn-sm mt-2" onclick="addItem()">
                    <i class="fas fa-plus me-1"></i> Tambah Item
                </button>
            </div>
        </div>

        {{-- BAGIAN 2: KONTAK & SOSMED --}}
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body p-4">
                <h5 class="fw-bold text-primary mb-4">
                    <i class="fas fa-address-card me-2"></i>Kontak & Informasi
                </h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-map-marker-alt text-danger me-1"></i> Alamat
                        </label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                            value="{{ old('address', $footer->address) }}">
                        @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-phone text-success me-1"></i> Nomor Telepon
                        </label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone', $footer->phone) }}">
                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-envelope text-warning me-1"></i> Email
                        </label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $footer->email) }}">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-copyright text-secondary me-1"></i> Teks Copyright
                        </label>
                        <input type="text" name="copyright" class="form-control @error('copyright') is-invalid @enderror"
                            value="{{ old('copyright', $footer->copyright) }}">
                        @error('copyright')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <hr class="my-4">
                <h6 class="fw-bold text-secondary mb-3">
                    <i class="fas fa-share-alt me-2"></i>Media Sosial
                </h6>
                <div class="row g-3">
                    {{-- Facebook --}}
                    <div class="col-md-2 d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <div class="rounded-3 d-flex align-items-center justify-content-center mx-auto mb-1"
                                style="width:44px;height:44px;background:#1877f2;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                                </svg>
                            </div>
                            <small class="text-muted fw-semibold">Facebook</small>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-semibold small text-muted">Nama Tampil</label>
                        <input type="text" name="fb_name" class="form-control"
                            value="{{ old('fb_name', $footer->fb_name) }}" placeholder="Grand Horizon">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-semibold small text-muted">URL</label>
                        <input type="url" name="fb_url" class="form-control"
                            value="{{ old('fb_url', $footer->fb_url) }}" placeholder="https://facebook.com/...">
                    </div>

                    {{-- Twitter/X --}}
                    <div class="col-md-2 d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <div class="rounded-3 d-flex align-items-center justify-content-center mx-auto mb-1"
                                style="width:44px;height:44px;background:#000;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                </svg>
                            </div>
                            <small class="text-muted fw-semibold">X / Twitter</small>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-semibold small text-muted">Nama Tampil</label>
                        <input type="text" name="tw_name" class="form-control"
                            value="{{ old('tw_name', $footer->tw_name) }}" placeholder="Grand Horizon">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-semibold small text-muted">URL</label>
                        <input type="url" name="tw_url" class="form-control"
                            value="{{ old('tw_url', $footer->tw_url) }}" placeholder="https://x.com/...">
                    </div>

                    {{-- Instagram --}}
                    <div class="col-md-2 d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <div class="rounded-3 d-flex align-items-center justify-content-center mx-auto mb-1"
                                style="width:44px;height:44px;background:linear-gradient(45deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                                </svg>
                            </div>
                            <small class="text-muted fw-semibold">Instagram</small>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-semibold small text-muted">Nama Tampil</label>
                        <input type="text" name="ig_name" class="form-control"
                            value="{{ old('ig_name', $footer->ig_name) }}" placeholder="Grand Horizon">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-semibold small text-muted">URL</label>
                        <input type="url" name="ig_url" class="form-control"
                            value="{{ old('ig_url', $footer->ig_url) }}" placeholder="https://instagram.com/...">
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i>Update Footer
                    </button>
                    <a href="{{ route('admin.footer.index') }}" class="btn btn-outline-secondary px-4">
                        Batal
                    </a>
                </div>
            </div>
        </div>

    </form>
</div>

<script>
function addItem() {
    const container = document.getElementById('biayaItemsContainer');
    const div = document.createElement('div');
    div.className = 'input-group mb-2 biaya-item-row';
    div.innerHTML = `
        <span class="input-group-text bg-success text-white">✔</span>
        <input type="text" name="biaya_items[]" class="form-control" placeholder="Contoh: Cicilan ringan">
        <button type="button" class="btn btn-outline-danger" onclick="removeItem(this)">
            <i class="fas fa-trash"></i>
        </button>`;
    container.appendChild(div);
}

function removeItem(btn) {
    btn.closest('.biaya-item-row').remove();
}
</script>
@endsection