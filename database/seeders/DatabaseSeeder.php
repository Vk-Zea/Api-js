<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(TypeStatusesSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RentalSeeder::class);
        $this->call(MovieSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
