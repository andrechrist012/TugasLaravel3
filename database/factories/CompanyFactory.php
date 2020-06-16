<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\Event;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    $event = Event::all()->pluck('id')->toArray();
    return [
        'company_name'=>$faker->company,
        'event_id' => $faker->randomElement($event)
    ];
});
