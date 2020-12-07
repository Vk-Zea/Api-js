<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\rentals;
use Illuminate\Support\Facades\Fash;
use Illuminate\Support\Facades\Hash;

class RentalSeeder extends Seeder
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
            $ren = new rentals();
            $ren->start_date = $faker->date();
            $ren->end_date = $faker->date();
            $ren->total = $faker->randomDigit(1000,100000);
            $ren->user_id = $faker->randomDigit(1,11);
            $ren->status_id = $faker->randomElement([1,2,3,4]); 
            $ren->save();
        }
    }
}
