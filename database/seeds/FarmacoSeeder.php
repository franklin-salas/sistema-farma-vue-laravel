<?php

use App\Farmaco;
use Illuminate\Database\Seeder;

class FarmacoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $farmacos = [
            'ACETAMINOFENO',
            'ACETIL CISTEINA',
            'ACIDO ASCORBICO',
            'ACIDO ACETIL SALICILICO',
            'ACIDO ASCORBICO',
            'ALCOHOL ETILICO',
            'ACIDO CLAVULANICO',
            'AMOXICILINA ',
            'AMOXICILINA TRIHIDRATO',
            'AZITROMICINA',
            'AZITROMICINA DIHIDRATO',
            'BETAMETASONA',
            'CEFIXIMA',
            'CEFIXIMA TRIHIDRATO',
            'CLARITROMICINA',
            'DEXAMETASONA'
            
            ];
            
            foreach($farmacos as $farmaco){
               
                Farmaco::create([
                    'nombre'=> $farmaco
                ]);
            }
    }
}
