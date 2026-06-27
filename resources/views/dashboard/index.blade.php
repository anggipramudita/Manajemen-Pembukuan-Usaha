@extends('layouts.app')

@section('title', 'Overview')

@section('content')
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="small-box bg-grad-1">
            <p>Total Saldo Kas</p>
            <h3>Rp 12.500k</h3>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="small-box bg-grad-2">
            <p>Pemasukan (Bulan Ini)</p>
            <h3>Rp 24.000k</h3>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="small-box bg-grad-3">
            <p>Pengeluaran (Bulan Ini)</p>
            <h3>Rp 17.000k</h3>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="small-box bg-grad-4">
            <p>Laba Bersih</p>
            <h3>Rp 7.000k</h3>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-8 col-lg-7 mb-4">
        <div class="card h-100">
            <div class="card-header border-0 pt-4 pb-0">
                <h3 class="card-title fw-semibold text-white">Statistik Arus Kas</h3>
            </div>
            <div class="card-body p-4">
                <canvas id="financeChart" height="250"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-5 mb-4">
        <div class="card h-100">
            <div class="card-header border-0 pt-4 pb-2">
                <h3 class="card-title fw-semibold text-white">Transaksi Terbaru</h3>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush px-2">
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 mb-2 rounded bg-opacity-10 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="bg-success bg-opacity-25 p-2 rounded me-3 text-success"><i class="bi bi-arrow-down-left fw-bold"></i></div>
                        <div><h6 class="mb-0 text-white">Penjualan Produk A</h6><small class="text-muted">Hari ini</small></div>
                    </div>
                    <span class="text-success fw-bold">+ Rp 5M</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 mb-2 rounded bg-opacity-10 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="bg-danger bg-opacity-25 p-2 rounded me-3 text-danger"><i class="bi bi-arrow-up-right fw-bold"></i></div>
                        <div><h6 class="mb-0 text-white">Bayar Listrik</h6><small class="text-muted">Kemarin</small></div>
                    </div>
                    <span class="text-danger fw-bold">- Rp 1.5M</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    Chart.defaults.color = '#94a3b8';
    Chart.defaults.font.family = 'Inter';
    const ctx = document.getElementById('financeChart').getContext('2d');
    let gradientIn = ctx.createLinearGradient(0, 0, 0, 400);
    gradientIn.addColorStop(0, 'rgba(16, 185, 129, 0.5)');
    gradientIn.addColorStop(1, 'rgba(16, 185, 129, 0.0)');
    let gradientOut = ctx.createLinearGradient(0, 0, 0, 400);
    gradientOut.addColorStop(0, 'rgba(239, 68, 68, 0.5)');
    gradientOut.addColorStop(1, 'rgba(239, 68, 68, 0.0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [
                {
                    label: 'Pemasukan',
                    data: [12, 19, 13, 25, 22, 24],
                    borderColor: '#10b981',
                    backgroundColor: gradientIn,
                    borderWidth: 3, fill: true, tension: 0.4,
                    pointBackgroundColor: '#10b981', pointBorderColor: '#fff', pointBorderWidth: 2, pointRadius: 4
                },
                {
                    label: 'Pengeluaran',
                    data: [10, 15, 12, 14, 11, 17],
                    borderColor: '#ef4444',
                    backgroundColor: gradientOut,
                    borderWidth: 3, fill: true, tension: 0.4,
                    pointBackgroundColor: '#ef4444', pointBorderColor: '#fff', pointBorderWidth: 2, pointRadius: 4
                }
            ]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            scales: { y: { beginAtZero: true, grid: { color: 'rgba(255, 255, 255, 0.05)' } }, x: { grid: { display: false } } },
            plugins: { legend: { position: 'top', align: 'end' }, tooltip: { backgroundColor: '#1e293b' } }
        }
    });
</script>
@endpush