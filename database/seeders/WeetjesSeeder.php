<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Weetje;

class WeetjesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Weetje::factory(10)->create();
    }
}
