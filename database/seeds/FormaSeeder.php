<?php

use App\Forma;
use Illuminate\Database\Seeder;

class FormaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formas = [
            'JARABE',
            'COMPRIMIDO',
            'TABLETA',
            'SOLUCION ORAL',
            'GRANULADO',
            'COMPRIMIDO MASTICABLE',
            'COMPRIMIDO EFERVESCENTE ',
            'UNGUENTO',
            'COMPRIMIDO RECUBIERTO'
           
            ];
            
            foreach($formas as $forma){
                
                Forma::create([
                    'nombre'=> $forma
                ]);
            }
    }
}
