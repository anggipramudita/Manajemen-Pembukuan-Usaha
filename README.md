# Manajemen Pembukuan Usaha (UMKM)

Aplikasi Web Manajemen Pembukuan Usaha yang dirancang untuk membantu UMKM mencatat pemasukan, pengeluaran, hutang, piutang, dan memantau laba bersih melalui dashboard interaktif.

## Fitur Utama
- **Dashboard Interaktif:** Menampilkan metrik keuangan dan grafik arus kas (Chart.js).
- **Manajemen Transaksi:** Pencatatan pemasukan, pengeluaran, dengan dukungan upload bukti transaksi.
- **Hutang & Piutang:** Pemantauan status tagihan dan pembayaran.
- **Kas & Bank:** Pencatatan saldo kas dan mutasi rekening.
- **Laporan Keuangan:** Laporan harian, bulanan, tahunan yang dapat diekspor ke PDF/Excel.
- **Manajemen Role:** Pemisahan hak akses antara Owner, Admin, dan Staff.

## Dokumentasi
Dokumen lengkap mengenai spesifikasi sistem dan panduan instalasi dapat ditemukan di dalam folder `docs/`:
1. [Analisis dan Desain Sistem](docs/1_Analisis_dan_Desain_Sistem.md) (Use Case, Activity, ERD)
2. [Dokumentasi Instalasi](docs/14_Dokumentasi_Instalasi.md)
3. [Manual Pengguna](docs/15_Manual_Pengguna.md)

## Teknologi yang Digunakan
- **Backend:** Laravel 12, PHP 8.3, MySQL
- **Frontend:** Bootstrap 5, AdminLTE 4, DataTables, SweetAlert2, Chart.js

---
*Proyek ini merupakan source code inti (Views, Controllers, Models, Migrations). Untuk menjalankan secara lokal, Anda perlu mengatur lingkungan Laravel menggunakan Composer.*
