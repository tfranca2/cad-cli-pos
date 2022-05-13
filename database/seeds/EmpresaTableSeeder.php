<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class EmpresaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('empresa')->insert(array (
            0 =>
            array (
                'id' => '1',
                'nome' => 'Base',
                'cnpj' => '98765432000198',
            )
        ));
    }
}
