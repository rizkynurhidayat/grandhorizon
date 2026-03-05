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
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kontak</th>
                            <th>Jadwal</th>
                            <th>Pesan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $index => $msg)
                        <tr>
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
                                <div style="max-width: 250px; white-space: normal;">
                                    {{ $msg->pesan }}
                                </div>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('admin.hubungi-kami.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Hapus pesan dari {{ $msg->user }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <p class="text-muted mb-0">Belum ada pesan yang masuk.</p>
                            </td>
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
@endsection