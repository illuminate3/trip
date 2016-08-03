<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

/**
 * Class ContactsTableSeeder
 */
class ContactsTableSeeder extends Seeder
{
    /**
     *
     */
    public function run()
    {
        $faker = new Faker;
        foreach (range(1, 50) as $r) {
            DB::table('contacts')->insert($this->contactInformation($r, 'App\Hotel'));
            DB::table('contacts')->insert($this->contactInformation($r, 'App\Venue'));
            DB::table('contacts')->insert($this->contactInformation($r, 'App\Vehicle'));
            DB::table('contacts')->insert($this->contactInformation($r, 'App\Tour'));
            DB::table('contacts')->insert($this->contactInformation($r, 'App\Restaurant'));
        }
    }


    /**
     * @param $id
     * @param $type
     * @return array
     */
    public function contactInformation($id, $type)
    {
        $faker = Faker::create();
        return [
            'contactable_id' => $id,
            'contactable_type' => $type,
            "representative" => $faker->text,
            "role" => "Relations Manager",
            "address" => $faker->address,
            "phone1" => $faker->phoneNumber,
            "phone2" => $faker->phoneNumber,
            "mobile" => $faker->phoneNumber,
            "email" => $faker->freeEmail,
            "fax" => $faker->phoneNumber,
            "facebook" => $faker->url,
            "website" => $faker->domainName,
            "latitude" => $faker->latitude(27, 28),
            "longitude" => $faker->longitude(83, 85),
            "district" => \Faker\Provider\ne_NP\Address::district(),
        ];
    }
}
