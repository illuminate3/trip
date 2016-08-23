<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Model::unguard();

        //factory(App\Hotel::class, 50)->create();
        // factory(App\Gallery::class, 250)->create();
        // factory(App\Restaurant::class, 50)->create();
        // factory(App\Venue::class, 50)->create();
        // factory(App\Vehicle::class, 50)->create();
        // factory(App\Tour::class, 50)->create();
        // factory(App\Package::class, 250)->create();
        // factory(App\Post::class,50)->create();
        //factory(App\Room::class, 250)->create();
        // factory(App\Review::class, 250)->create();
        // $this->call(ContactsTableSeeder::class);
         $this->call(WatchtowerTableSeeder::class);
        Model::reguard();
    }
}
