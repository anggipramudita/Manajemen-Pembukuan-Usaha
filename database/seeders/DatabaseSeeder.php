<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\IncomeCategory;
use App\Models\ExpenseCategory;
use App\Models\Company;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $ownerRole = Role::create(['name' => 'Owner']);
        $adminRole = Role::create(['name' => 'Admin']);
        $staffRole = Role::create(['name' => 'Staff']);

        $owner = User::create(['name' => 'Owner UMKM', 'email' => 'owner@example.com', 'password' => Hash::make('password')]);
        $owner->assignRole($ownerRole);

        $admin = User::create(['name' => 'Admin Usaha', 'email' => 'admin@example.com', 'password' => Hash::make('password')]);
        $admin->assignRole($adminRole);

        $staff = User::create(['name' => 'Staff Biasa', 'email' => 'staff@example.com', 'password' => Hash::make('password')]);
        $staff->assignRole($staffRole);

        Company::create(['name' => 'Usaha Maju Bersama', 'address' => 'Jl. Merdeka No. 10', 'phone' => '08123456789']);

        $inc_cats = ['Penjualan', 'Jasa', 'Pendapatan Lain'];
        foreach($inc_cats as $c) IncomeCategory::create(['name' => $c]);

        $exp_cats = ['Belanja Barang', 'Gaji', 'Listrik', 'Air', 'Internet', 'Transportasi', 'Operasional', 'Pajak', 'Lainnya'];
        foreach($exp_cats as $c) ExpenseCategory::create(['name' => $c]);
    }
}
