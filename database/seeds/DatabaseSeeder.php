<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(LaboratorioSeeder::class);
        $this->call(FormaSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(TipoSeeder::class);
        $this->call(FarmacoSeeder::class);
        $this->call(AlmacenSeeder::class);
        $this->call(ProveedorSeeder::class);


    }
    
}
