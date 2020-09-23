<?php

use Illuminate\Database\Seeder;
use App\User;
use App\TypeUser;
use App\Rol;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    		
            $user = new User();
            $user->id_tipo_documento = "1";
            $user->nombres = "Admin";            
            $user->apellidos = "Sistema";
            $user->direccion = "ninguna";
            $user->email = "admin";
            $user->estado = "inactivo";
            $user->password = bcrypt('admin');
            $user->save();

            $id_user = $user->id;

            $type = new TypeUser();
            $type->id_rol = '1';
            $type->id_user = $id_user;
            $type->save();
    }
}
