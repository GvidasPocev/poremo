<?php

namespace Database\Seeders;

use App\Models\GalleryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleryTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GalleryType::insert([
            ['name' => 'Galerija'],
            ['name' => 'Atestatai'],
        ]);
    }
}
