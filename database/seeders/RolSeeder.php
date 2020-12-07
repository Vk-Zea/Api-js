<?php

namespace Database\Seeders;

use App\Models\roles;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
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
            ['name' => 'Administrador', 'status_id' => 1],
            ['name' => 'Cliente', 'status_id' => 1],
            ['name' => 'Empleado', 'status_id' => 1]
        ];

        foreach($arrayData as $data){
            $TS = new roles();
            $TS->name = $data['name'];
            $TS->status_id = $data['status_id'];
            $TS->save();
        }
    }
}
