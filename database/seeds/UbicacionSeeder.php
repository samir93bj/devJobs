<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paises = array('Argentina','Mexico','Brasil','Chile','Uruguay','Paraguay');

        foreach($paises as $pais){
            DB::table('ubicacions')->insert([
                'nombre' => $pais,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
