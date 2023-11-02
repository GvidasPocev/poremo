<?php

namespace Database\Seeders;

use App\Models\PageType;
use Illuminate\Database\Seeder;

class PageTypeTableSeeder extends Seeder
{
    public function run()
    {
        PageType::insert([
            ['name' => 'Kontaktai'],
            ['name' => 'Taisyklės ir sąlygos'],
            ['name' => 'Privatumo politika'],
        ]);
    }
}
