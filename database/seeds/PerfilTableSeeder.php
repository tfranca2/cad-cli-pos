<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PerfilTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('perfil')->insert(array (
            0 =>
            array (
                'id' => '1',
                'nome' => 'Administrador',
            ),
            1 =>
            array (
                'id' => '2',
                'nome' => 'Usuário',
            ),
        ));
    }
}
