@extends('layouts.master')
@section('title', 'Daftar Absensi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Daftar Absensi Karyawan</h1>
    <a href="{{ route('attendances.create') }}" class="btn btn-primary"><i class="bi bi-calendar-plus me-1"></i> Catat Absensi Manual</a>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">{{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-info">
                    <tr>
                        <th>ID</th>
                        <th>Karyawan</th>
                        <th>Tanggal</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Status</th>
                        <th width="100px">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->id }}</td>
                        <td>{{ $attendance->employee->nama_lengkap ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d M Y') }}</td>
                        <td>{{ $attendance->waktu_masuk ?? '-' }}</td>
                        <td>{{ $attendance->waktu_keluar ?? '-' }}</td>
                        <td>
                            <span class="badge
                                @if($attendance->status_absensi == 'hadir') bg-success
                                @elseif($attendance->status_absensi == 'izin') bg-warning
                                @elseif($attendance->status_absensi == 'sakit') bg-info
                                @else bg-danger
                                @endif">
                                {{ ucfirst($attendance->status_absensi) }}
                            </span>
                        </td>
                        <td>
                             <a class="btn btn-info btn-sm" href="{{ route('attendances.show', $attendance->id) }}"><i class="bi bi-eye"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data Absensi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- Tampilkan pagination jika ada --}}
        <div class="d-flex justify-content-center">
            {{ $attendances->links() }}
        </div>
    </div>
</div>
@endsection
