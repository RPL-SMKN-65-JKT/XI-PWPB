<?php

namespace Database\Seeders;

use App\Models\Status_Peminjaman;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status_Peminjaman::create([
            'name' => "Menunggu Verifikasi"
        ]);
        Status_Peminjaman::create([
            'name' => "Sedang Dipinjam"
        ]);
        Status_Peminjaman::create([
            'name' => "Sudah Dikembalikan"
        ]);
        Status_Peminjaman::create([
            'name' => "Melewati Tenggat"
        ]);
        Status_Peminjaman::create([
            'name' => "Gagal Verifikasi"
        ]);
    }
}
