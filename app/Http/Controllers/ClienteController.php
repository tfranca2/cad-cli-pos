<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
         $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'nullable|email|unique:clientes,email',
            'cpf' => 'required_without:telefone|string|unique:clientes,cpf',
            'telefone' => 'required_without:cpf|string|unique:clientes,telefone',
        ]);

        if ($validator->fails()) {
            throw new ValidatorException(json_encode($validator->errors()->all()));
        }
    }

    public function get(Request $request, $cpf_telefone)
    {
        $cpf_telefone = Helper::onlyNumbers($cpf_telefone);
        $cliente = Cliente::where('cpf', $cpf_telefone)->orWhere('telefone', $cpf_telefone)->first();

        if( !$cliente and strlen($cpf_telefone) == 11 and env('CONSULTA_CPF', false) ){
            $pessoa = \DB::connection('mysql2')->select("SELECT * FROM cadcpf WHERE CPF = '". $cpf_telefone ."'");
            if( $pessoa ) $pessoa = $pessoa[0];

            $cliente = Cliente::create([
                'cpf' => $pessoa->CPF,
                'nome' => $pessoa->nome,
                'nascimento' => $pessoa->data_nascimento,
                'email' => $pessoa->ds_email,
                'telefone' => $pessoa->telefone_1,
            ]);
            $cliente = $cliente->fresh();
        }

        if( $cliente )
            return response()->json($cliente, 200 );

        return response()->json([], 404 );
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
