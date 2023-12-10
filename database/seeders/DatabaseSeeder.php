<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use App\Models\Category;
use App\Models\Classification;
use App\Models\Type;
use App\Models\Role;
use App\Models\Status_Peminjaman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Classification::create([
            'name' => 'Fiksi'
        ]);

        Classification::create([
            'name' => 'Non Fiksi'
        ]);

        Type::create([
            'name' => 'Komik',
            'classification_id' => 1
        ]);

        Type::create([
            'name' => 'Novel',
            'classification_id' => 1
        ]);

        Type::create([
            'name' => 'Ensiklopedia',
            'classification_id' => 2
        ]);

        Type::create([
            'name' => 'Majalah',
            'classification_id' => 2
        ]);

        Type::create([
            'name' => 'Panduan',
            'classification_id' => 2
        ]);

        Category::create([
            'name' => 'Action',
            'classification_id' => 1
        ]);

        Category::create([
            'name' => 'Adventure',
            'classification_id' => 1
        ]);

        Category::create([
            'name' => 'Romance',
            'classification_id' => 1
        ]);

        Category::create([
            'name' => 'Komedi',
            'classification_id' => 1
        ]);

        Category::create([
            'name' => 'Horror',
            'classification_id' => 1
        ]);

        Category::create([
            'name' => 'Sport',
            'classification_id' => 1
        ]);

        Category::create([
            'name' => 'Drama',
            'classification_id' => 1
        ]);

        Category::create([
            'name' => 'Sains',
            'classification_id' => 2
        ]);

        Category::create([
            'name' => 'Sejarah',
            'classification_id' => 2
        ]);

        Category::create([
            'name' => 'Komputer',
            'classification_id' => 2
        ]);

        // $onePieceBook = Book::create([
        //     'title' => 'One Piece 100',
        //     'slug' => 'one-piece-100',
        //     'author' => 'Eichiro Oda',
        //     'publisher' => 'Shueisha',
        //     'publication_year' => '2022',
        //     'isbn' => '9786230035142',
        //     'image' => 'book-image/onePiece.jpg',
        //     'description' => 'Haoshoku . Para pemeran utama telah berkumpul di atap. Luffy dan kawan-kawan berhadapan menantang Kaido & Mom. Apa ada cara untuk menang menghadapi aliansi terkuat!? Seperti apa masa depan yang sedang menanti dalam duel ekstrem frontal ini!? Guncangan super dahsyat melanda Onigashima!! Simak kisah petualangan di lautan, One Piece!!',
        //     'status' => true,
        //     'classification_id' => 1,
        //     'type_id' => 1
        // ]);

        // $onePieceCategories = [1, 2];
        // $onePieceBook->categories()->attach($onePieceCategories);

        // $sejarahNasionalDanDuniaBook = Book::create([
        //     'title' => 'Sejarah Nasional Dan Dunia',
        //     'slug' => 'sejarah-nasional-dan-dunia',
        //     'author' => 'Retno Sasongkowati',
        //     'publisher' => 'Indoeduka',
        //     'publication_year' => '2016',
        //     'isbn' => '9786021129104',
        //     'image' => 'sejarah nasional dan dunia.jpg',
        //     'description' => 'Belajar tentang sejarah dan masa lampau adalah belajar tentang semua bidang ilmu. Belajar sejarah adalah belajar tentang pengalaman masa lampau yang akan berguna untuk saat ini dan di masa yang akan datang. Dunia yang sekarang ini terbentuk dari rentetan-rentetan peristiwa-peristiwa penting di masa lalu. peristiwa-peristiwa itu tentunya menjadi pengalaman yang terus mengembangkan manusia sampai dengan saat ini. Buku "Ensiklopedia Sejarah Nasional dan dunia" ini berisi peristiwa-peristiwa penting dalam sejarah Indonesia dan dunia. Sejarah nasional akan membahas dari manusia zaman purba, zaman hindu-budha, zaman islam, kedatangan dan ekspansi bangsa Eropa, zaman pergerakan nasional dan kemerdekaan, zaman orde lama dan orde baru, hingga pemerintahan Jokowi saat ini. Sedangkan sejarah dunia, akan membahas mulai dari masa purba, abad gelap, renaissance, perang dunia I dan II, perang dingin dan masih banyak bahasan lainnya.',
        //     'status' => 1,
        //     'classification_id' => 2,
        //     'type_id' => 3
        // ]);

        // $sejarahCategories = [5];
        // $sejarahNasionalDanDuniaBook->categories()->attach($sejarahCategories);

        Role::create([
            'title' => 'Admin'
        ]);

        Role::create([
            'title' => 'Petugas'
        ]);

        Role::create([
            'title' => "Member"
        ]);

        User::create([
            'name' => "Fathul Bari",
            'place_of_birth' => "Bogor",
            'date_of_birth' => Carbon::parse('2006-05-09'),
            'gender' => "Pria",
            'email' => "fbari687@gmail.com",
            'username' => 'fbariaja',
            'phone_number' => "08990897159",
            'password' => bcrypt("bari123"),
            'address' => "Jl. Pedati Raya RT 02/001 Balimester, Jatinegara",
            'role_id' => 1
        ]);

        User::create([
            'name' => "Kevin Aulia Reynaldi",
            'place_of_birth' => "Jakarta",
            'date_of_birth' => Carbon::parse('2006-11-27'),
            'gender' => "Pria",
            'email' => "kevinauliareynaldi@gmail.com",
            'username' => 'kevinGaming',
            'phone_number' => "089529797205",
            'password' => bcrypt("kevin123"),
            'address' => "Jl. Arus RT 01 RW 12 No. 14, Cawang, Kramatjati, Jakarta Timur",
            'role_id' => 2
        ]);

        User::create([
            'name' => "Fikri Aidhil Setiansyah",
            'place_of_birth' => "Jakarta",
            'date_of_birth' => Carbon::parse('2005-11-30'),
            'gender' => "Pria",
            'email' => "aidhil522@gmail.com",
            'username' => 'fikriGaming',
            'phone_number' => "081319449299",
            'password' => bcrypt("fikri123"),
            'address' => "Jl. Prumpung Sawah RT 001 RW 004, Cipinang Besar Utara,Jatinegara,Jakarta Timur, D.K.I Jakarta",
            'role_id' => 3
        ]);
    }
}
