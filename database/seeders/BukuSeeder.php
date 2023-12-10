<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Buku::create([
            'nama'  => 'Lili Moli (Light Novel)',
            'pengarang' => 'Fauzan Rifaza',
            'penerbit'  => '-',
            'deskripsi' => 'Demi nyatain perasaannya ke cewek yang ditaksir, anak laki-laki ini rela terjang apapun bahkan sampai dapet julukan “PEDOFIL PENCURI ORGAN.”

            “Kamu yang kemarin kan, kenapa lari!?” Orang yang tiba-tiba dateng dengan nyolot ini adalah satpam kemarin, si penyulut isu jeroan! Ini jelas bahaya.
            
            Secara singkat aku langsung jadi pusat perhatian. Sekarang yang lihatin aku nggak cuman mbak-mbak glowing, tapi juga bapak-ibu guru yang baru dateng, tukang cilok penthol, bahkan penjual sempolan dan kucing jalanan.
            
            Semua itu merangsang sesuatu dalam celanaku bergetar lebih kencang dari sebelumnya, kantung kemihku pasti
            
            ',
            'tahun_terbit'  => 2023,
            'halaman'   => '153',
            'jumlah_buku'   =>  '10',
            'gambar'    => 'assets/Lili-Moli-Light-Novel.jpg',
            'kategori'  => 'Novel',
            'genre' => 'romance'
        ],
        
    
    );
    }
}
