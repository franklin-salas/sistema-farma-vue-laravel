<?php

use App\Proveedor;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $categorias = [
        //     '',
        //     'ANTIÁCIDOS',
        //     'ANTIALÉRGICOS',
        //     'ANTIDIARREICOS',
        //     'ANTIINFECCIOSOS Y ANTIVIRAL',
        //     'ANTIINFLAMATORIOS',
        //     'ANTIPIRÉTICOS',
        //     'ANTITUSIVOS',
        //     'LAXANTES',
        //     'COSMETICOS',
        //     'INSTRUMENTO DE LABORATORIO',
        //     'INSTRUMENTO MÉDICO',
            
        //     ];
            
            // foreach($categorias as $categoria){
               
            //     Categoria::create([
            //         'nombre'=> $categoria
            //     ]);
            // }

            $proveedor = new Proveedor();
            $proveedor->nombre = 'Marcelo Salazar';
            $proveedor->razon_social = 'Telchi S.A.';
            $proveedor->nit = '845879224';
            $proveedor->direccion = '2do anillo, Av. Beni ';
            $proveedor->telefono = '784589463';
            $proveedor->save();

            $proveedor2 = new Proveedor();
            $proveedor2->nombre = 'Jose Luis Salazar';
            $proveedor2->razon_social = 'LaFa S.R.L.';
            $proveedor2->nit = '84584';
            $proveedor2->direccion = '4do anillo, Av. Brazil ';
            $proveedor2->telefono = '784589463';
            $proveedor2->save();

    }
}
