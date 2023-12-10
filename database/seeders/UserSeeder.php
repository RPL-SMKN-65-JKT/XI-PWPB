<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => 2,
            'buku_id' => null,
            'izin_ebook' => false,

            'nama' => 'Achmad Surya',
            'email' => 'surya@gmail.com',
            'telepon' => '085817000940',
            'alamat' => 'Jl. Lorem ipsum dolor sit amet consectetur.', 
            'foto' => null,
            
            'slug' => 'achmads',
            'username' => 'achmads',
            'password' => Hash::make('achmad'),
        ]);


        User::create([
            'role_id' => 2,
            'buku_id' => null,
            'izin_ebook' => false,

            'nama' => 'Yurika',
            'email' => 'rika@gmail.com',
            'telepon' => '085817000943',
            'alamat' => 'Jl. Lorem ipsum dolor sit amet consectetur.', 
            'foto' => null,
            
            'slug' => 'rika',
            'username' => 'rika',
            'password' => Hash::make('rika'),
        ]);

        User::create([
            'role_id' => 2,
            'buku_id' => null,
            'izin_ebook' => false,

            'nama' => 'Ratna',
            'email' => 'ratna@gmail.com',
            'telepon' => '085817000944',
            'alamat' => 'Jl. Lorem ipsum dolor sit amet consectetur.', 
            'foto' => null,
            
            'slug' => 'ratna',
            'username' => 'ratna',
            'password' => Hash::make('ratna'),
        ]);

        User::create([
            'role_id' => 2,
            'buku_id' => null,
            'izin_ebook' => false,

            'nama' => 'Arif Ibrahim',
            'email' => 'arif@gmail.com',
            'telepon' => '085817000945',
            'alamat' => 'Jl. Lorem ipsum dolor sit amet consectetur.', 
            'foto' => null,
            
            'slug' => 'arif',
            'username' => 'arif',
            'password' => Hash::make('arif'),
        ]);

        User::create([
            'role_id' => 2,
            'buku_id' => null,
            'izin_ebook' => false,

            'nama' => 'Fathul Bari',
            'email' => 'bari@gmail.com',
            'telepon' => '085817000946',
            'alamat' => 'Jl. Lorem ipsum dolor sit amet consectetur.', 
            'foto' => null,
            
            'slug' => 'bari',
            'username' => 'bari',
            'password' => Hash::make('bari'),
        ]);

        User::create([
            'role_id' => 2,
            'buku_id' => null,
            'izin_ebook' => false,

            'nama' => 'Zikriyandri',
            'email' => 'zikri@gmail.com',
            'telepon' => '085817000947',
            'alamat' => 'Jl. Lorem ipsum dolor sit amet consectetur.', 
            'foto' => null,
            
            'slug' => 'zikri',
            'username' => 'zikri',
            'password' => Hash::make('zikri'),
        ]);
    }
}
