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


function generateRandomPirateRank()
{
    $rank_names = ['Captain', 'First mate', 'Boatswain', 'Second mate', 'Sergeant-at-arms', 'Seaman', 'Cook',];
    $rand_key = array_rand($rank_names, 1);
    $random_pirate_rank = $rank_names[$rand_key];
    return $random_pirate_rank;
}


$factory->define(App\Pirate::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'rank' => generateRandomPirateRank(),
    ];
});
