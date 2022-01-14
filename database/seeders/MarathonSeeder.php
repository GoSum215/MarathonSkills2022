<?php

namespace Database\Seeders;

use App\Models\Marathon;
use Illuminate\Database\Seeder;

class MarathonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        Marathon::query()->delete();
        Marathon::factory(random_int(5, 15))->create();
    }
}
