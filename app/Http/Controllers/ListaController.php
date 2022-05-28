<?php

namespace App\Http\Controllers;

use App\User;
use App\Lista;
use App\Perfil;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;


class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        foreach( Perfil::All() as $perfil ){
            if( ! Helper::perfilTemPermissao($perfil->id, 'lista-gerenciar') ){
                $perfis[] = $perfil->id;
            }
        }
        $usuarios = User::whereIn('perfil_id', [ $perfis ])->get();
        return view( 'lista.upload', [ 'usuarios' => $usuarios ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = \Str::random(20). time() .'.'. request()->lista->getClientOriginalExtension();
        request()->lista->move( public_path('uploads'), $fileName );

        $file = fopen(public_path("uploads/".$fileName), "r");
        while(!feof($file)) {
            $line = rtrim( fgets($file), "\r\n" );

            if( !$line )
                continue;

            if( str_contains($line, 'Pasta: ') ){
                $pasta = str_replace('Pasta: ', '', $line);
                continue;
            }

            if( !isset( $pasta ) or !$pasta )
                return response()->json([ 'error' => 'Arquivo fora do padrão.' ], 400 );

            $url = explode('/', $line);
            $bilhete = explode('.', end($url) )[0];
            $bilhete = intval( substr($bilhete, -8, -1) );

            if( ! Lista::where('bilhete',$bilhete)->where('pasta', $pasta)->exists() ){
                Lista::create([
                    'pasta' => $pasta,
                    'url' => $line,
                    'bilhete' => $bilhete,
                    'user_id' => $request->user_id,
                ]);
            }
        }
        fclose($file);

        return response()->json([ 'message' => 'Cadastrado com sucesso', 'redirectURL' => url('/lista') ], 201 );
    }

    public function progresso( Request $request, $id ){
        $total = lista::where('user_id', $id)->count();
        $feito = lista::where('user_id', $id)->where('cadastrado', 1)->count();
        return response()->json([
            'total' => $total,
            'feito' => $feito,
            'resto' => ( $total - $feito ),
            'porcentagem' => ( ($total) ? ( ( $feito / $total ) * 100 ) : 0 ),
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
