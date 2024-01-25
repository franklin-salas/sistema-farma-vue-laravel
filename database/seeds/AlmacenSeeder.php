<?php

use App\Almacen;
use Illuminate\Database\Seeder;

class AlmacenSeeder extends Seeder
{
    /**
     * Run the database seeds.

     * @return void
     */
    public function run()
    {
        $almacenes = [
            'FARMACIA-ALMACEN',
            'CLINICA-ALMACEN',
            
            ];
            
            foreach($almacenes as $almacen){
               
                Almacen::create([
                    'nombre'=> $almacen
                ]);
            }
        
    }
}
