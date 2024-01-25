<?php

use Illuminate\Database\Seeder;
use App\User;
class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        $usuario = new User();
        $usuario->name = "Jose";
        $usuario->apellido = "Suarez";
        $usuario->ci = "75453";
        $usuario->email = "admin@gmail.com";
        $usuario->password = bcrypt('admin');
        $usuario->save();
    }
}
