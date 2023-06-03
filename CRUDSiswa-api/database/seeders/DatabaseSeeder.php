<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Factory::create();

    	for($i = 1; $i <= 50; $i++){

            Siswa::create([
                'id_siswa' => $i,
                'nis' => $faker->randomNumber(8, true),
                'nama' => $faker->name(),
                'rombel' => 'PPLG XI-'.$faker->numberBetween(1, 5)
            ]);

    	}
    }
}
