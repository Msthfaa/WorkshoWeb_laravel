@extends('layouts.master')
@section('title', 'Detail Slip Gaji')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white">
        <h4 class="mb-0"><i class="bi bi-receipt me-2"></i> Slip Gaji Periode {{ ucfirst($salary->bulan) }}</h4>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Karyawan:</strong>
                <p>{{ $salary->employee->nama_lengkap ?? 'Karyawan Dihapus' }}</p>
            </div>
            <div class="col-md-6">
                <strong>Jabatan:</strong>
                <p>{{ $salary->employee->position->nama_jabatan ?? 'N/A' }}</p>
            </div>
        </div>

        <hr>

        <h5 class="mt-4 mb-3">Rincian Penghasilan</h5>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td width="50%">Gaji Pokok</td>
                    <td class="text-end">Rp{{ number_format($salary->gaji_pokok, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Tunjangan</td>
                    <td class="text-end">Rp{{ number_format($salary->tunjangan, 2, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <h5 class="mt-4 mb-3">Rincian Potongan</h5>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td width="50%">Potongan</td>
                    <td class="text-end text-danger">(Rp{{ number_format($salary->potongan, 2, ',', '.') }})</td>
                </tr>
            </tbody>
        </table>

        <hr class="my-4">

        <h4 class="d-flex justify-content-between text-success">
            <span>TOTAL GAJI BERSIH</span>
            <span class="fw-bold">Rp{{ number_format($salary->total_gaji, 2, ',', '.') }}</span>
        </h4>

    </div>
    <div class="card-footer text-end">
        <a href="{{ route('salaries.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali ke Daftar Gaji</a>
    </div>
</div>
@endsection
