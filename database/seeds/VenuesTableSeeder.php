<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class VenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(0, 50) as $r) {
            DB::table('venues')->insert([
                'name' => $faker->company,
                'logo' => $faker->imageUrl($width = 300, $height = 120),
                'slug' => str_replace(" ", "-", strtolower($faker->company)),
                'status' => str_random(0,1)
            ]);
        }
    }
}
