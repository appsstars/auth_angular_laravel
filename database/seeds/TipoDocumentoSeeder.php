<?php

use Illuminate\Database\Seeder;
use App\TipoDocumento;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		$tipos_documento = array(
    			array('tipo'=>'Cedula de ciudadania'),
    			array('tipo'=>'Cedula de Extrangeria'),
    			array('tipo'=>'Nit'),
				array('tipo'=>'Passaporte'),
				array('tipo'=>'Carnet Diplomatico')

    		);

    		foreach ($tipos_documento as $value) {
    			$tipo = new TipoDocumento();
    			$tipo->tipo = $value['tipo'];
    			$tipo->save();
    		}

    }
}
