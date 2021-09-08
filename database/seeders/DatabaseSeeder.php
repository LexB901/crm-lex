<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Categorie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Sport', 'Autos', 'Kunst', 'Natuur', 'Techniek', 'Eten', 'Transpoort'
        ];
        foreach ($categories as $categorie) {

            Categorie::create([
                'categorie' => $categorie
            ]);
        }
        $this->call([WeetjesSeeder::class]);
        // \App\Models\User::factory(10)->create();
    }
}
