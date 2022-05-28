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

    public function csv()
    {
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; charset=UTF-8; filename=". date('YmdHis') ."_clientes.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $clientes = Cliente::All();

        $callback = function() use ( $clientes ){
            $file = fopen('php://output', 'w');
            fputcsv($file, [ 
                'cpf',
                'nome',
                'nascimento',
                'email',
                'telefone',
                'cep',
                'endereco',
                'numero',
                'bairro',
                'complemento',
                'cidade',
                'uf',
            ], ';', '"', "\n");

            foreach( $clientes as $cliente ){
                fputcsv( $file, [ 
                    Helper::formatCpfCnpj( $cliente->cpf ), 
                    utf8_decode( $cliente->nome ), 
                    utf8_decode( $cliente->nascimento ), 
                    utf8_decode( $cliente->email ), 
                    utf8_decode( $cliente->telefone ), 
                    utf8_decode( $cliente->cep ), 
                    utf8_decode( $cliente->endereco ), 
                    utf8_decode( $cliente->numero ), 
                    utf8_decode( $cliente->bairro ), 
                    utf8_decode( $cliente->complemento ), 
                    utf8_decode( $cliente->cidade ), 
                    utf8_decode( $cliente->uf ), 
                ], ';', '"', "\n" );
            }
            fclose($file);
        };

        return \Response::stream( $callback, 200, $headers );
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
