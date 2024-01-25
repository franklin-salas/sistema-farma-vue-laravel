<?php

use App\Laboratorio;
use Illuminate\Database\Seeder;

class LaboratorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $laboratorios = [
        'LAFAR S.A.',
        'LABORATORIOS FARMACEUTICOS LAFAR S.A.',
        'QUIMFA S.A.',
        'ZAMBON S.P.A',
        'DROGUERIA INTI S.A',
        'ARBOFARMA S.A',
        'LABORATORIOS DE COSMETICA Y FARMOQUIMICA S.A. "COFAR S.A.',
        'ALTEA FARMACEUTICA S.A',
        'LABORATORIOS VITA SA.',
        'INDUFAR C.I.S.A. DIVISION',
        'LABORATORIOS INDUFAR',
        'BAYER S.A.',
        ];
        
        foreach($laboratorios as $laboratorio){
          
            Laboratorio::create([
                'nombre'=> $laboratorio
            ]);
        }
    }
}
