<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Movie;
use Illuminate\Support\Facades\Fash;
use Illuminate\Support\Facades\Hash;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i= 0; $i<= 10; $i++){
            $ren = new Movie();
            $ren->name = $faker->word;
            $ren->description = $faker->text(100);
            $ren->status_id = $faker->randomElement([1,2,3,4]);
            $ren->user_id = $faker->randomDigit(1,11);
            $ren->save();
        }
    }
}
