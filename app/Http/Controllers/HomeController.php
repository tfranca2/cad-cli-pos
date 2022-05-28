<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Perfil;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        foreach( Perfil::All() as $perfil ){
            if( ! Helper::perfilTemPermissao($perfil->id, 'lista-gerenciar') ){
                $perfis[] = $perfil->id;
            }
        }
        $usuarios = User::whereIn('perfil_id', [ $perfis ])->get();
        $user = Auth::user();
        return view('home',[
            'usuarios' => $usuarios,
            'user' => $user,
        ]);

    }

}
