# Manual Pengguna (Manajemen Pembukuan Usaha)

## 1. Login ke Aplikasi
- Akses halaman utama aplikasi (contoh: `http://127.0.0.1:8000`).
- Masukkan Email dan Password Anda.
  - Default Owner: `owner@example.com` (password: `password`)
  - Default Admin: `admin@example.com` (password: `password`)
  - Default Staff: `staff@example.com` (password: `password`)

## 2. Memahami Dashboard
Dashboard menampilkan ringkasan keuangan usaha Anda secara real-time:
- **Saldo Kas**: Total sisa uang tunai yang ada.
- **Pemasukan & Pengeluaran Bulan Ini**: Total transaksi di bulan berjalan.
- **Laba Bersih**: Dihitung otomatis dari `Total Pemasukan - Total Pengeluaran`.
- **Grafik Interaktif**: Menggunakan Chart.js untuk menampilkan tren keuangan.

## 3. Mengelola Pemasukan & Pengeluaran
- Navigasi ke menu **Transaksi > Pemasukan** atau **Pengeluaran**.
- Klik tombol **Tambah**.
- Isi form (Tanggal, Kategori, Nominal, Keterangan).
- Anda dapat mengunggah (upload) bukti berupa foto/nota struk.
- Klik **Simpan**. Saldo Kas akan otomatis terupdate.

## 4. Mengelola Hutang & Piutang
- Navigasi ke menu **Hutang / Piutang**.
- Catat siapa pemberi hutang (atau pelanggan yang berhutang), nominal, dan jatuh tempo.
- Jika ada pembayaran, perbarui status menjadi **Lunas**.

## 5. Laporan Keuangan
- Pilih menu **Laporan**.
- Tentukan jenis laporan (Harian, Bulanan, Tahunan) atau jenis transaksi (Laba Rugi).
- Klik **Cetak PDF** atau **Export Excel** untuk mengunduh laporan.

## 6. Pengaturan Usaha
- Khusus untuk role **Owner** dan **Admin**, Anda dapat mengubah Nama Usaha, Logo, dan Informasi kontak melalui menu **Pengaturan Usaha**.
- Semua aktivitas perubahan di dalam aplikasi akan tercatat di **Activity Log**.
