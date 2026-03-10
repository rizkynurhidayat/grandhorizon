@extends('admin.dashboard')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Manajemen Footer</h2>
    </div>

    @if(session('success'))
    <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <form action="{{ route('admin.footer.store') }}" method="POST">
        @csrf

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
                        value="{{ old('biaya_judul', 'Biaya Pemesanan Mulai 3 Juta') }}">
                </div>
                <label class="form-label fw-semibold">
                    Item Keuntungan <small class="text-muted">(centang-centang)</small>
                </label>
                <div id="biayaItemsContainer">
                    @php
                        $defaultItems = ['Cicilan ringan','GRATIS 1 unit AC','Hadiah menarik lainnya GRATIS','PPN GRATIS','KPR GRATIS','DP GRATIS','GRATIS biaya surat-surat'];
                        $items = old('biaya_items', $defaultItems);
                    @endphp
                    @foreach($items as $item)
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
                            placeholder="Jl. Raya Cilegon, Serang" value="{{ old('address') }}">
                        @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-phone text-success me-1"></i> Nomor Telepon
                        </label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            placeholder="0821-4627-3679" value="{{ old('phone') }}">
                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-envelope text-warning me-1"></i> Email
                        </label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Horizon123@gmail.com" value="{{ old('email') }}">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-copyright text-secondary me-1"></i> Teks Copyright
                        </label>
                        <input type="text" name="copyright" class="form-control @error('copyright') is-invalid @enderror"
                            placeholder="© 2025 GRAND HORIZON" value="{{ old('copyright', '© 2025 GRAND HORIZON') }}">
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
                            placeholder="Grand Horizon" value="{{ old('fb_name') }}">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-semibold small text-muted">URL</label>
                        <input type="url" name="fb_url" class="form-control"
                            placeholder="https://facebook.com/..." value="{{ old('fb_url') }}">
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
                            placeholder="Grand Horizon" value="{{ old('tw_name') }}">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-semibold small text-muted">URL</label>
                        <input type="url" name="tw_url" class="form-control"
                            placeholder="https://x.com/..." value="{{ old('tw_url') }}">
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
                            placeholder="Grand Horizon" value="{{ old('ig_name') }}">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-semibold small text-muted">URL</label>
                        <input type="url" name="ig_url" class="form-control"
                            placeholder="https://instagram.com/..." value="{{ old('ig_url') }}">
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i>Simpan Footer
                    </button>
                </div>
            </div>
        </div>

    </form>

    {{-- PREVIEW FOOTER AKTIF --}}
    @if($active)
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4">
            <h5 class="fw-bold text-success mb-3">
                <i class="fas fa-eye me-2"></i>Preview Footer Aktif
            </h5>

            {{-- Preview Biaya Pemesanan --}}
            @if($active->biaya_judul || $active->biaya_items)
            <div class="rounded-3 p-4 mb-3 text-white text-center" style="background:#0d1f3c;">
                <h4 class="fw-bold mb-4" style="font-family:Georgia,serif;">{{ $active->biaya_judul }}</h4>
                <div class="d-flex flex-wrap justify-content-center gap-4">
                    @foreach(($active->biaya_items ?? []) as $item)
                    <span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="me-1">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        {{ $item }}
                    </span>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Preview Footer Body --}}
            <div class="rounded-3 overflow-hidden" style="border:2px solid #dee2e6;">
                <div style="background:#0d1f3c; padding:32px 48px 28px;">
                    <div class="d-flex justify-content-center flex-wrap gap-5 mb-3">
                        <div class="d-flex align-items-center gap-2 text-white">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
                            </svg>
                            <span style="font-size:.9rem;">{{ $active->address }}</span>
                        </div>
                        <div class="d-flex align-items-center gap-2 text-white">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.38 2 2 0 0 1 3.6 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.6a16 16 0 0 0 6.29 6.29l.97-.97a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                            <span style="font-size:.9rem;">{{ $active->phone }}</span>
                        </div>
                        <div class="d-flex align-items-center gap-2 text-white">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
                            </svg>
                            <span style="font-size:.9rem;">{{ $active->email }}</span>
                        </div>
                    </div>
                    <hr style="border-color:rgba(255,255,255,.22);margin:0 0 20px;">
                    <div class="d-flex justify-content-center flex-wrap gap-5">
                        @if($active->fb_name)
                        <a href="{{ $active->fb_url ?? '#' }}" target="_blank"
                           class="d-flex align-items-center gap-2 text-white text-decoration-none fw-semibold" style="font-size:.9rem;">
                            <div class="rounded-2 d-flex align-items-center justify-content-center"
                                style="width:30px;height:30px;background:#1877f2;flex-shrink:0;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="white"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                            </div>
                            {{ $active->fb_name }}
                        </a>
                        @endif
                        @if($active->tw_name)
                        <a href="{{ $active->tw_url ?? '#' }}" target="_blank"
                           class="d-flex align-items-center gap-2 text-white text-decoration-none fw-semibold" style="font-size:.9rem;">
                            <div class="rounded-2 d-flex align-items-center justify-content-center"
                                style="width:30px;height:30px;background:#000;flex-shrink:0;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="white"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </div>
                            {{ $active->tw_name }}
                        </a>
                        @endif
                        @if($active->ig_name)
                        <a href="{{ $active->ig_url ?? '#' }}" target="_blank"
                           class="d-flex align-items-center gap-2 text-white text-decoration-none fw-semibold" style="font-size:.9rem;">
                            <div class="rounded-2 d-flex align-items-center justify-content-center"
                                style="width:30px;height:30px;background:linear-gradient(45deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);flex-shrink:0;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                                </svg>
                            </div>
                            {{ $active->ig_name }}
                        </a>
                        @endif
                    </div>
                </div>
                <div class="text-center py-3 fw-bold" style="background:#fff;font-size:.88rem;letter-spacing:.5px;">
                    {{ $active->copyright }}
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- TABEL RIWAYAT --}}
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <h5 class="fw-bold text-primary mb-4">
                <i class="fas fa-list me-2"></i>Riwayat Footer
            </h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Item Biaya</th>
                            <th>Status</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($footers as $i => $footer)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $footer->address }}</td>
                            <td>{{ $footer->phone }}</td>
                            <td>{{ $footer->email }}</td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ count($footer->biaya_items ?? []) }} item
                                </span>
                            </td>
                            <td>
                                @if($footer->is_active)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Tidak Aktif</span>
                                @endif
                            </td>
                            <td class="text-muted small">{{ $footer->created_at->format('d M Y, H:i') }}</td>
                            <td>
                                <div class="d-flex gap-1 flex-wrap">
                                    <a href="{{ route('admin.footer.edit', $footer) }}"
                                       class="btn btn-sm btn-warning text-white">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if(!$footer->is_active)
                                    <form action="{{ route('admin.footer.activate', $footer) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    @endif
                                    <form action="{{ route('admin.footer.destroy', $footer) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin hapus footer ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                Belum ada data footer.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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