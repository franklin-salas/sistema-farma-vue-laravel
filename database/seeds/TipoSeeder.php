<?php

use App\TipoProducto;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            'MEDICAMENTOS',
            'INSTRUMENTOS',
            'NORMAL'
            
            
            ];
            
            foreach($tipos as $tipo){
               
                TipoProducto::create([
                    'nombre'=> $tipo
                ]);
            }
    }
}
