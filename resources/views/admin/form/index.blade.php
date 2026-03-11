@extends('admin.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">📧 Daftar Pesan Masuk (Jadwal Kunjungan)</h5>
            </div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama & Email</th>
                                <th>No. HP</th>
                                <th>Jadwal</th>
                                <th>Pesan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $index => $msg)
                                <tr class="{{ $msg->is_read ? '' : 'table-warning fw-bold' }}">
                                    <td>{{ $messages->firstItem() + $index }}</td>
                                    <td>
                                        <strong>{{ $msg->user }}</strong><br>
                                        <small class="text-muted">{{ $msg->email }}</small>
                                    </td>
                                    <td>{{ $msg->no_hp }}</td>
                                    <td>
                                        <span class="badge bg-primary">
                                            {{ \Carbon\Carbon::parse($msg->tanggal)->format('d M Y') }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ Str::limit($msg->pesan, 30) }}
                                        @if(!$msg->is_read)
                                            <span class="badge bg-danger ms-1">Baru</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-link text-dark p-0" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                                <li>
                                                    <button class="dropdown-item" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#detailModal{{ $msg->id }}"
                                                        onclick="markAsRead({{ $msg->id }})">
                                                        <i class="fas fa-eye text-primary me-2"></i> Detail
                                                    </button>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <form action="{{ route('admin.hubungi-kami.destroy', $msg->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Hapus pesan dari {{ $msg->user }}?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">
                                                            <i class="fas fa-trash me-2"></i> Hapus
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="detailModal{{ $msg->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0 shadow">
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title">Detail Pesan</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="small text-muted d-block">Nama Pengirim</label>
                                                    <strong>{{ $msg->user }}</strong>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <label class="small text-muted d-block">Email</label>
                                                        <span>{{ $msg->email }}</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="small text-muted d-block">No. HP</label>
                                                        <span>{{ $msg->no_hp }}</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="small text-muted d-block">Rencana Kunjungan</label>
                                                    <span class="text-primary fw-bold">{{ \Carbon\Carbon::parse($msg->tanggal)->format('l, d F Y') }}</span>
                                                </div>
                                                <div class="mb-0">
                                                    <label class="small text-muted d-block">Isi Pesan</label>
                                                    <div class="p-3 bg-light border rounded mt-1">
                                                        {{ $msg->pesan }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer bg-light">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $msg->no_hp) }}"
                                                    target="_blank" class="btn btn-success">
                                                    <i class="fab fa-whatsapp me-1"></i> Balas WhatsApp
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">Belum ada pesan masuk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
    function markAsRead(id) {
        fetch(`/admin/hubungi-kami/${id}/read`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        }).then(() => {
            // Hilangkan highlight baris
            const row = document.querySelector(`[data-bs-target="#detailModal${id}"]`).closest('tr');
            row.classList.remove('table-warning', 'fw-bold');
            const badge = row.querySelector('.badge.bg-danger');
            if (badge) badge.remove();

            // Update badge sidebar
            const sidebarBadge = document.querySelector('.sidebar .badge.bg-danger');
            if (sidebarBadge) {
                const current = parseInt(sidebarBadge.textContent);
                if (current <= 1) {
                    sidebarBadge.remove();
                } else {
                    sidebarBadge.textContent = current - 1;
                }
            }
        });
    }
    </script>
@endsection