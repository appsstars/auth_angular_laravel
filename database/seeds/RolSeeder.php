<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$rols = array(
			array('tipo'=>'superadmin'),
			array('tipo'=>'admin'),
		);

		foreach ($rols as $value) {
			$rol = new Rol();
			$rol->tipo = $value['tipo'];
			$rol->save();
		}
    }
}
