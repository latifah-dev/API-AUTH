<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::query()->insert([
            ["nama" => "action"],
            ["nama" => "drama"],
            ["nama" => "horor"],
            ["nama" => "comedy"],  
        ]);
    }
}
