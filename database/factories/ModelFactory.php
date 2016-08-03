<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'username' => $faker->unique()->userName,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];

});

$factory->define(App\Hotel::class, function (Faker\Generator $faker) {
  $company =  $faker->unique()->company;
    return [
        'name' => $company,
        'logo' => $faker->imageUrl($width = 300, $height = 120),
        'slug' => str_replace(" ","-",strtolower($company)),
        'description' => $faker->realText(500),
    ];


});

$factory->define(App\Restaurant::class, function (Faker\Generator $faker){
  $company =  $faker->unique()->company;
  return [
        'name' => $company,
        'logo' => $faker->imageUrl($width = 300, $height = 120),
        'slug' => str_replace(" ", "-", strtolower($company) ),
        'description' => $faker->realText(500),
  ];

});
$factory->define(App\Gallery::class, function (Faker\Generator $faker){
  $str = rand(1,5);
  switch ($str) {
    case "1":
      $model = 'App\Hotel';
      break;
    case "2":
      $model = 'App\Restaurant';
      break;
    case "3":
      $model = 'App\Tour';
      break;
    case "4":
      $model = 'App\Vehicle';
      break;
    default:
      $model = 'App\Venue';
      break;
  }
  return [
      'imageable_id' => rand(0,50),
      'imageable_type' => $model,
      'image' => $faker->imageUrl($width = 250, $height = 250),
      'title' => $faker->text,
      'description' => $faker->realText('200'),
  ];

});

$factory->define(App\Venue::class, function (Faker\Generator $faker){
  $company =  $faker->unique()->company;
  return [
        'name' => $company,
        'logo' => $faker->imageUrl($width = 300, $height = 120),
        'slug' => str_replace(" ", "-", strtolower($company) ),
        'description' => $faker->realText(500),
  ];

});

$factory->define(App\Vehicle::class, function(Faker\Generator $faker){
  $company =  $faker->unique()->company;
  return [
    'name' => $company,
    'logo' => $faker->imageUrl($width = 300, $height = 120),
    'slug' => str_replace(" ", "-" ,strtolower($company) ),
    'description' => $faker->realText(500),
  ];

});
$factory->define(App\Tour::class, function(Faker\Generator $faker){
  $company =  $faker->unique()->company;
  return [
    'name' => $company,
    'logo' => $faker->imageUrl($width = 300, $height = 120),
    'slug' => str_replace(" ", "-" ,strtolower($company) ),
    'description' => $faker->realText(500),
  ];
});

$factory->define(App\Package::class, function(Faker\Generator $faker){

   return [
    'price' => rand(50,1000),
    'duration' => rand(2,20),
     'image' => $faker->imageUrl(200,200),
    'difficulty' => "A",
    'best_season' => "March April",
    'tour_id' => rand(1,50),
    'description' => $faker->realText(500),
  ];
});
$factory->define(App\Room::class, function(Faker\Generator $faker){

   return [
    'price' => rand(50,1000),
    'name' => $faker->name,
    'type' => "A",
    'image' => $faker->imageUrl(200,200),
    'description' => $faker->realText(500),
    'number_of_rooms' => rand(0,50),
    'available_rooms' => rand(1,25),
    'hotel_id' => rand(1,50),
  ];
});
$factory->define(App\Post::class, function(Faker\Generator $faker){

   return [
      'title' => $faker->realText(30),
      'image' => $faker->imageUrl(250,250),
      'content' => $faker->realText(300),
      'user_id' => rand(0,50)
  ];
});


$factory->define(App\Review::class, function(Faker\Generator $faker){
  $str = rand(1,5);
  switch ($str) {
    case "1":
      $model = 'App\Hotel';
      break;
    case "2":
      $model = 'App\Restaurant';
      break;
    case "3":
      $model = 'App\Tour';
      break;
    case "4":
      $model = 'App\Vehicle';
      break;
    default:
      $model = 'App\Venue';
      break;
  }
  return [
    'rating' => $faker->numberBetween(0,5),
    'review' => $faker->realText(100),
    'user_id' => rand(0,50),
    'reviewable_id' => rand(0,50),
    'reviewable_type' => $model,
  ];
});
