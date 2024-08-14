<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Elenco delle categorie da inserire
        $categories = [
            ['name' => 'Web'],
            ['name' => 'AI'],
            ['name' => 'Design'],
        ];

        // Inserimento delle categorie nella tabella
        DB::table('categories')->insert($categories);
    }
}
