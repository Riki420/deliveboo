<?php

use Illuminate\Database\Seeder;
use FakerRestaurant\Provider\en_US\Restaurant as Faker_Restaurant;
use Faker\Generator as Faker;
use App\Models\Plate;
use App\User;
use Illuminate\Support\Arr;


class PlatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker_Restaurant $faker_restaurant, Faker $faker)
    {

        $users = User::pluck('id')->toArray();

        for ($i = 0; $i < 30; $i++) {
            $new_plate = new Plate();
            $new_plate->user_id = Arr::random($users);
            $new_plate->name = $faker_restaurant->foodName();
            $new_plate->ingredients = $faker->paragraph();
            $new_plate->description = $faker->paragraph();
            $new_plate->course = $faker->words(1, true);
            $new_plate->price = $faker->randomFloat(2, 1, 30);
            $new_plate->visibility = $faker->boolean();
            $new_plate->save();
        }
    }
}
