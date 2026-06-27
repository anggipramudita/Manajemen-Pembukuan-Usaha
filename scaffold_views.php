<?php

$dir = __DIR__;

// Create folders if they don't exist
$folders = [
    'resources/views/layouts',
    'resources/views/dashboard',
    'resources/views/transactions/income',
    'public/css',
    'public/js'
];
foreach ($folders as $f) {
    if (!is_dir($dir . '/' . $f)) {
        mkdir($dir . '/' . $f, 0777, true);
    }
}

$views = [
    'resources/views/layouts/app.blade.php' => <<<EOT
<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - FinTrack UMKM</title>
    <!-- AdminLTE & Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @stack('styles')
</head>
<body class="layout-fixed sidebar-expand-lg">
    <div class="app-wrapper">
        <!-- Navbar -->
        <nav class="app-header navbar navbar-expand">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" data-lte-toggle="sidebar" href="#" role="button"><i class="bi bi-grid-fill"></i></a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" id="toggleDarkMode" title="Toggle Theme"><i class="bi bi-moon-fill"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><i class="bi bi-bell-fill"></i></a>
                    </li>
                    <li class="nav-item d-flex align-items-center ms-3">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name ?? 'Owner+UMKM' }}&background=6366f1&color=fff" class="rounded-circle" width="35" alt="User">
                        <span class="ms-2 text-white fw-medium">{{ Auth::user()->name ?? 'Owner UMKM' }}</span>
                    </li>
                </ul>
            </div>
        </nav>
        
        <!-- Sidebar -->
        <aside class="app-sidebar shadow-lg">
            <div class="sidebar-brand text-center">
                <a href="{{ route('dashboard') }}" class="brand-link text-decoration-none">
                    <span class="brand-text fw-bold text-white fs-4">FinTrack <span class="text-primary">•</span></span>
                </a>
            </div>
            <div class="sidebar-wrapper mt-3">
                <nav>
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item px-2 mb-2">
                            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : 'text-white' }}">
                                <i class="nav-icon bi bi-house-door-fill"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item px-2 mb-2">
                            <a href="{{ route('incomes.index') }}" class="nav-link {{ request()->routeIs('incomes.*') ? 'active' : 'text-white' }}">
                                <i class="nav-icon bi bi-wallet2"></i>
                                <p>Data Pemasukan</p>
                            </a>
                        </li>
                        <li class="nav-item px-2 mb-2">
                            <a href="{{ route('expenses.index') }}" class="nav-link {{ request()->routeIs('expenses.*') ? 'active' : 'text-white' }}">
                                <i class="nav-icon bi bi-cart-dash-fill"></i>
                                <p>Data Pengeluaran</p>
                            </a>
                        </li>
                        <li class="nav-item px-2 mb-2">
                            <a href="{{ route('reports.index') }}" class="nav-link {{ request()->routeIs('reports.*') ? 'active' : 'text-white' }}">
                                <i class="nav-icon bi bi-pie-chart-fill"></i>
                                <p>Laporan Keuangan</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="app-main">
            <div class="app-content-header pb-0">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h3 class="mb-0 fw-bold fs-2 text-white mt-3 mb-4">@yield('title')</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </main>
        
        <footer class="app-footer text-center border-0" style="background: transparent; color: #64748b;">
            <strong>Copyright &copy; 2026 FinTrack UMKM.</strong> All rights reserved.
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @stack('scripts')
</body>
</html>
EOT,
    'resources/views/dashboard/index.blade.php' => <<<EOT
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
EOT,
    'resources/views/transactions/income/index.blade.php' => <<<EOT
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
    \$(document).ready(function() {
        \$('#incomeTable').DataTable({
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
EOT,
    'public/css/custom.css' => <<<EOT
/* Premium Custom UI */
body { 
    font-family: 'Inter', sans-serif;
    background-color: #0f172a; 
    color: #e2e8f0;
    transition: all 0.3s ease;
}

/* Sidebar Premium */
.app-sidebar {
    background: rgba(15, 23, 42, 0.7) !important;
    backdrop-filter: blur(12px);
    border-right: 1px solid rgba(255, 255, 255, 0.05);
}
.brand-link { border-bottom: 1px solid rgba(255, 255, 255, 0.05); }
.nav-link.active {
    background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%) !important;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
    color: white !important;
}
.nav-link:hover:not(.active) {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
}

/* Navbar Premium */
.app-header {
    background: rgba(15, 23, 42, 0.8) !important;
    backdrop-filter: blur(12px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

/* Cards & Stat Boxes */
.card {
    background: #1e293b;
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}
.card-header { border-bottom: 1px solid rgba(255, 255, 255, 0.05); }

.small-box { 
    border-radius: 16px; 
    padding: 24px; 
    color: white;
    border: none;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
}
.small-box:hover { transform: translateY(-8px) scale(1.02); box-shadow: 0 15px 35px rgba(0,0,0,0.3); }

/* Gradients for Stats */
.bg-grad-1 { background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3); }
.bg-grad-2 { background: linear-gradient(135deg, #10b981 0%, #059669 100%); box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3); }
.bg-grad-3 { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); box-shadow: 0 8px 20px rgba(245, 158, 11, 0.3); }
.bg-grad-4 { background: linear-gradient(135deg, #ec4899 0%, #be185d 100%); box-shadow: 0 8px 20px rgba(236, 72, 153, 0.3); }

.small-box h3 { font-size: 2rem; font-weight: 700; margin-bottom: 5px; letter-spacing: -0.5px; }
.small-box p { font-size: 1rem; opacity: 0.8; margin-bottom: 0; font-weight: 500;}

.small-box::after {
    content: '';
    position: absolute;
    right: -20px;
    bottom: -20px;
    width: 100px;
    height: 100px;
    background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 70%);
    border-radius: 50%;
}

/* Button Premium */
.btn-primary {
    background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
    border: none;
    border-radius: 8px;
    font-weight: 500;
    padding: 8px 20px;
    box-shadow: 0 4px 10px rgba(99, 102, 241, 0.3);
    transition: all 0.3s;
}
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(99, 102, 241, 0.5);
}
.btn-action {
    border-radius: 8px;
    transition: all 0.2s;
}
.btn-action:hover { transform: scale(1.1); }

/* Table Premium */
.table { color: #cbd5e1; }
.table-dark { --bs-table-bg: #0f172a; --bs-table-color: #fff; }
.table-bordered > :not(caption) > * > * { border-color: rgba(255,255,255,0.05); }
.table-striped > tbody > tr:nth-of-type(odd) > * { background-color: rgba(255, 255, 255, 0.02); color: #cbd5e1; }
.table-striped > tbody > tr:hover > * { background-color: rgba(99, 102, 241, 0.05); }

/* DataTables Custom */
div.dataTables_wrapper div.dataTables_filter input {
    border-radius: 8px;
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1);
    color: white;
    padding: 6px 12px;
}
div.dataTables_wrapper div.dataTables_filter input:focus {
    outline: none; border-color: #6366f1; box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
}
div.dataTables_wrapper div.dataTables_length select {
    background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: white; border-radius: 8px;
}
.page-item.active .page-link { background-color: #6366f1; border-color: #6366f1; }
.page-link { background-color: transparent; border-color: rgba(255,255,255,0.05); color: #cbd5e1; }
.page-link:hover { background-color: rgba(255,255,255,0.05); color: #fff; }
EOT,
    'public/js/custom.js' => <<<EOT
document.getElementById('toggleDarkMode')?.addEventListener('click', function(e) {
    e.preventDefault();
    const htmlElement = document.documentElement;
    if (htmlElement.getAttribute('data-bs-theme') === 'dark') {
        htmlElement.setAttribute('data-bs-theme', 'light');
        document.body.style.backgroundColor = '#f8fafc';
        document.body.style.color = '#334155';
    } else {
        htmlElement.setAttribute('data-bs-theme', 'dark');
        document.body.style.backgroundColor = '#0f172a';
        document.body.style.color = '#e2e8f0';
    }
});
EOT
];

foreach($views as $path => $content) {
    file_put_contents($dir . "/" . $path, $content);
}

echo "Premium Views, JS, and CSS synchronized into Laravel structure successfully.";
