<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('menus')->insert(array (
            0 =>
            array (
                'id' => '1',
                'permission' => 'usuarios-listar',
                'icon' => 'fa fa-user-plus',
                'label' => 'Usuários',
                'link'  => 'usuarios',
            )
        ));
    }
}
