@extends('layouts.app')

@section('title', 'Transaksi Pemasukan')

@section('content')
<div class="card p-2">
    <div class="card-header d-flex justify-content-between align-items-center border-0 pt-4 pb-3">
        <h3 class="card-title m-0 fw-semibold text-white">Data Master Pemasukan</h3>
        <button class="btn btn-primary ms-auto" onclick="showAddModal()">
            <i class="bi bi-plus-lg me-1"></i> Input Pemasukan Baru
        </button>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped align-middle" id="incomeTable">
            <thead class="table-dark">
                <tr>
                    <th class="py-3">No. Transaksi</th>
                    <th class="py-3">Tanggal</th>
                    <th class="py-3">Kategori</th>
                    <th class="py-3">Keterangan</th>
                    <th class="py-3 text-end">Nominal (Rp)</th>
                    <th class="py-3 text-center">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><span class="badge bg-secondary bg-opacity-25 text-secondary border border-secondary">IN-001</span></td>
                    <td>28 Jun 2026</td>
                    <td><span class="badge bg-success bg-opacity-25 text-success">Penjualan</span></td>
                    <td>Penjualan 10 Box Produk A</td>
                    <td class="text-end fw-semibold">5.000.000</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-info text-white btn-action me-1"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-sm btn-danger btn-action"><i class="bi bi-trash3-fill"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#incomeTable').DataTable({
            "language": {
                "search": "Cari Transaksi:",
                "lengthMenu": "Tampilkan _MENU_ data",
                "info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data"
            }
        });
    });

    function showAddModal() {
        Swal.fire({
            title: 'Input Pemasukan Baru',
            html: `
                <div class="mb-3 text-start">
                    <label class="form-label text-muted fs-6">Nominal Pemasukan</label>
                    <input class="form-control bg-dark border-secondary text-white" placeholder="Contoh: 1500000">
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label text-muted fs-6">Keterangan</label>
                    <textarea class="form-control bg-dark border-secondary text-white" rows="3" placeholder="Deskripsi..."></textarea>
                </div>
            `,
            background: '#1e293b',
            color: '#fff',
            confirmButtonText: '<i class="bi bi-save me-1"></i> Simpan Transaksi',
            confirmButtonColor: '#4f46e5',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            cancelButtonColor: '#ef4444',
            customClass: { popup: 'border border-secondary rounded-4', confirmButton: 'rounded-3', cancelButton: 'rounded-3' }
        });
    }
</script>
@endpush