<?php

namespace Database\Seeders;

use App\Models\Classification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Classification::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'fiksi', 'non fiksi'
        ];

        foreach ($data as $value) {
            Classification::insert([
                'name' => $value

            ]);
        }
    }
}
