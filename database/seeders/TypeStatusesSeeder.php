<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\type_statuses;

class TypeStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayData = 
        [
            ['name' => 'General'],
            ['name' => 'Peliculas'],
            ['name' => 'Usuarios']
        ];

        foreach($arrayData as $data){
            $TS = new type_statuses();
            $TS->name = $data['name'];
            $TS->save();
        }
    }
}
