<?php

use App\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            'ANALGÉSICOS',
            'ANTIÁCIDOS',
            'ANTIALÉRGICOS',
            'ANTIDIARREICOS',
            'ANTIINFECCIOSOS Y ANTIVIRAL',
            'ANTIINFLAMATORIOS',
            'ANTIPIRÉTICOS',
            'ANTITUSIVOS',
            'LAXANTES',
            'COSMETICOS',
            'INSTRUMENTO DE LABORATORIO',
            'INSTRUMENTO MÉDICO',
            
            ];
            
            foreach($categorias as $categoria){
               
                Categoria::create([
                    'nombre'=> $categoria
                ]);
            }
    }
    
}
