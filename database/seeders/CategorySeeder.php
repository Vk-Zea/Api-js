<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\categories;
use Illuminate\Support\Facades\Fash;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
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
            $ren = new categories();
            $ren->name = $faker->word;
            $ren->status_id = $faker->randomElement([1,2,3,4]);
            $ren->save();
        }
    }
}
