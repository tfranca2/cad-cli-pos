<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permissions')->insert(array (
            0 =>
            array (
                'id'=>'1',
                'role'=>'configuracoes-editar',
                'perfil_id'=>'1',
            ),
            1 =>
            array (
                'id'=>'2',
                'role'=>'configuracoes-excluir',
                'perfil_id'=>'1',
            ),
            2 =>
            array (
                'id'=>'3',
                'role'=>'configuracoes-gerenciar',
                'perfil_id'=>'1',
            ),
            3 =>
            array (
                'id'=>'4',
                'role'=>'configuracoes-incluir',
                'perfil_id'=>'1',
            ),
            4 =>
            array (
                'id'=>'5',
                'role'=>'configuracoes-listar',
                'perfil_id'=>'1',
            ),
            5 =>
            array (
                'id'=>'6',
                'role'=>'empresas-editar',
                'perfil_id'=>'1',
            ),
            6 =>
            array (
                'id'=>'7',
                'role'=>'empresas-excluir',
                'perfil_id'=>'1',
            ),
            7 =>
            array (
                'id'=>'8',
                'role'=>'empresas-gerenciar',
                'perfil_id'=>'1',
            ),
            8 =>
            array (
                'id'=>'9',
                'role'=>'empresas-incluir',
                'perfil_id'=>'1',
            ),
            9 =>
            array (
                'id'=>'10',
                'role'=>'empresas-listar',
                'perfil_id'=>'1',
            ),
            10 =>
            array (
                'id'=>'11',
                'role'=>'perfis-editar',
                'perfil_id'=>'1',
            ),
            11 =>
            array (
                'id'=>'12',
                'role'=>'perfis-excluir',
                'perfil_id'=>'1',
            ),
            12 =>
            array (
                'id'=>'13',
                'role'=>'perfis-gerenciar',
                'perfil_id'=>'1',
            ),
            13 =>
            array (
                'id'=>'14',
                'role'=>'perfis-incluir',
                'perfil_id'=>'1',
            ),
            14 =>
            array (
                'id'=>'15',
                'role'=>'perfis-listar',
                'perfil_id'=>'1',
            ),
            15 =>
            array (
                'id'=>'16',
                'role'=>'usuarios-editar',
                'perfil_id'=>'1',
            ),
            16 =>
            array (
                'id'=>'17',
                'role'=>'usuarios-excluir',
                'perfil_id'=>'1',
            ),
            17 =>
            array (
                'id'=>'18',
                'role'=>'usuarios-gerenciar',
                'perfil_id'=>'1',
            ),
            18 =>
            array (
                'id'=>'19',
                'role'=>'usuarios-incluir',
                'perfil_id'=>'1',
            ),
            19 =>
            array (
                'id'=>'20',
                'role'=>'usuarios-listar',
                'perfil_id'=>'1',
            ),
        ));
    }
}
