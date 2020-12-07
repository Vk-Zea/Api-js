<?php

namespace Database\Seeders;

use App\Models\statuses;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
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
            ['name' => 'Activo', 'type_statuses_id' => 1],
            ['name' => 'Inactivo', 'type_statuses_id' => 1],
            ['name' => 'Pendiente', 'type_statuses_id' => 2],
            ['name' => 'Bloqueado', 'type_statuses_id' => 1],
        ];

        foreach($arrayData as $data){
            $TS = new statuses();
            $TS->name = $data['name'];
            $TS->type_status_id = $data['type_statuses_id'];
            $TS->save();
        }
    }
}
