<?php

use Faker\Factory as Faker;

class StarTableSeeder extends Seeder
{

    public function run()
    {


        $faker = Faker::create();
        $count = rand(0, 100);

        $sectors = Sector::all();

        for ($i = 0; $i < $count; $i++) {
            $star = new Star();

            $star->name = $faker->firstName;
            $star->discription = $faker->lastName;
            $star->sector_id = $sectors[rand(0, count($sectors)-1)]->id;

            $star->save();
        }
    }
}