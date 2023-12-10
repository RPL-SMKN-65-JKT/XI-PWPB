<?php

namespace Database\Seeders;

use App\Models\AcceptEbook;
use App\Models\RentLogs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RentlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 2; $i <= 5; $i++) {
            RentLogs::create([
                'kode' => 'perpus' . Str::random(8),
                'user_id' => $i,
                'buku_id' => $i,
                'tanggal_pinjam' => '2023-12-09',
                'tanggal_kembali' => '2023-12-14',
                'dikembalikan'    => null,
                'hari_terlambat' => null,
                'denda'        => null,
                'status'    => 'Butuh Persetujuan'
            ]);
        }

        // for ($i = 2; $i <= 5; $i++) {
        //     AcceptEbook::create([
        //         'user_id' => $i,
        //         'buku_id' => $i,
        //         'tanggal' => '2023-12-08',
        //         'status'    => 'proses-izin'
        //     ]);
        // }

        // for ($i = 2; $i <= 13; $i++) {
        //     RentLogs::create([
        //         'kode' => 'qilaaa' . Str::random(8),
        //         'user_id' => 3,
        //         'buku_id' => $i,
        //         'tanggal_pinjam' => '2023-12-4',
        //         'tanggal_kembali' => '2023-12-9',
        //         'dikembalikan'    => '2023-12-5',
        //         'hari_terlambat' => null,
        //         'denda'        => null,
        //         'status'    => 'Dikembalikan'
        //     ]);
        // }

        // for ($i = 2; $i <= 13; $i++) {
        //     RentLogs::create([
        //         'kode' => 'qilaaa' . Str::random(8),
        //         'user_id' => 3,
        //         'buku_id' => $i,
        //         'tanggal_pinjam' => '2023-12-3',
        //         'tanggal_kembali' => '2023-12-8',
        //         'dikembalikan'    => '2023-12-4',
        //         'hari_terlambat' => null,
        //         'denda'        => null,
        //         'status'    => 'Dikembalikan'
        //     ]);
        // }


        // for ($i = 2; $i <= 13; $i++) {
        //     RentLogs::create([
        //         'kode' => 'qilaaa' . Str::random(8),
        //         'user_id' => 3,
        //         'buku_id' => $i,
        //         'tanggal_pinjam' => '2023-12-2',
        //         'tanggal_kembali' => '2023-12-7',
        //         'dikembalikan'    => '2023-12-3',
        //         'hari_terlambat' => null,
        //         'denda'        => null,
        //         'status'    => 'Dikembalikan'
        //     ]);
        // }

        // for ($i = 2; $i <= 13; $i++) {
        //     RentLogs::create([
        //         'kode' => 'qilaaa' . Str::random(8),
        //         'user_id' => 3,
        //         'buku_id' => $i,
        //         'tanggal_pinjam' => '2023-12-1',
        //         'tanggal_kembali' => '2023-12-6',
        //         'dikembalikan'    => '2023-12-2',
        //         'hari_terlambat' => null,
        //         'denda'        => null,
        //         'status'    => 'Dikembalikan'
        //     ]);
        // }

    }
}
