<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $experiencias = array('0 - 6 Meses','6 Meses - 1 Año','1 Año - 2 Años','2 Años a 5 Años','5 Años en Adelante');

        foreach($experiencias as $experiencia){
            DB::table('experiencias')->insert([
                'nombre' => $experiencia,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
