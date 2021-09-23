<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SalarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salarios = array('0 - 500 USD','500 USD - 1000 USD','1000 USD - 2000 USD','2000 USD - 7000 USD','7000 USD en Adelante');

        foreach($salarios as $salario){
            DB::table('salarios')->insert([
                'nombre' => $salario,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
