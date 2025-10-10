@extends('layouts.master')
@section('title', 'Daftar Gaji')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Daftar Slip Gaji</h1>
    <a href="{{ route('salaries.create') }}" class="btn btn-primary"><i class="bi bi-calculator me-1"></i> Buat Slip Gaji</a>
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
                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>Karyawan</th>
                        <th>Periode Bulan</th>
                        <th>Gaji Pokok</th>
                        <th>Total Gaji Bersih</th>
                        <th width="100px">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($salaries as $salary)
                    <tr>
                        <td>{{ $salary->id }}</td>
                        <td>{{ $salary->employee->nama_lengkap ?? 'N/A' }}</td>
                        <td>{{ ucfirst($salary->bulan) }}</td>
                        <td>Rp{{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                        <td class="fw-bold">Rp{{ number_format($salary->total_gaji, 0, ',', '.') }}</td>
                        <td>
                             <a class="btn btn-info btn-sm" href="{{ route('salaries.show', $salary->id) }}"><i class="bi bi-eye"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data Slip Gaji.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- Tampilkan pagination jika ada --}}
        <div class="d-flex justify-content-center">
            {{ $salaries->links() }}
        </div>
    </div>
</div>
@endsection
