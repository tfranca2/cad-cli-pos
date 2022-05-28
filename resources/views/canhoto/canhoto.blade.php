<?php use App\Helpers; ?>
@extends('layouts.app')
@section('content')

<style>
#canhoto_atual {
    margin: auto;
    display: block;
    max-height: 350px;
    max-width: 80%;
}

.ui-content-body {
    margin-bottom: 0;
    padding-bottom: 0;
}
</style>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card recent-activites">
            <div class="panel-heading">
                {{ ((isset($user))?'Editar':'Novo') }} canhoto
            </div>

            <div class="panel-body">

                <img src="{{ $canhotoScan->url }}" id="canhoto_atual">

                <form action="{{ url('/clientes') }}" method="post" enctype="multipart/form-data" class="form-edit"
                    data-parsley-validate autocomplete="off">
                    @csrf
                    <input type="hidden" id="cliente_id" name="cliente_id">
                    <input type="hidden" name="canhoto_id" value="{{ $canhotoScan->id }}">
                    <br />
                    <div class="row">

                        <div class="col-md-2 p-lr-o">
                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <label for="">Telefone</label>
                                    <input type="text" class="form-control telefone" id="telefone" name="telefone"
                                        placeholder="(00) 0 0000-0000" value="{{ (isset($user)?$user->name:'') }}"
                                        maxlength="16" tabindex="1">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 p-lr-o">

                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <label for="">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf"
                                        placeholder="000.000.000-00" value="{{ (isset($user)?$user->name:'') }}"
                                        maxlength="14" data-parsley-cpf="true" tabindex="2">
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6 p-lr-o">

                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <label for="">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" required=""
                                        placeholder="Nome completo" value="{{ (isset($user)?$user->name:'') }}"
                                        tabindex="-1">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 p-lr-o">

                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <label for="">Título</label>
                                    <input type="text" class="form-control" name="titulo" placeholder="00000"
                                        readonly="true" value="{{ $canhotoScan->bilhete }}" tabindex="-1">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-2 p-lr-o">

                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <label for="">CEP</label>
                                    <input type="text" class="form-control" id="cep" name="cep" placeholder="00.000-000"
                                        value="{{ (isset($user)?$user->name:'') }}" maxlength="10" tabindex="3">
                                </div>
                            </div>

                        </div>

                        <div class="col-md-5 p-lr-o">

                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <label for="">Endereço</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco"
                                        placeholder="(Ex.: Rua, Trav, Est, Av)"
                                        value="{{ (isset($user)?$user->name:'') }}" tabindex="-1">
                                </div>
                            </div>

                        </div>

                        <div class="col-md-2 p-lr-o">

                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <label for="">Número</label>
                                    <input type="text" class="form-control" id="numero" name="numero" placeholder="0000"
                                        value="{{ (isset($user)?$user->name:'') }}" tabindex="4">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 p-lr-o">

                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <label for="">Bairro</label>
                                    <input type="text" class="form-control" id="bairro" name="bairro"
                                        placeholder="Bairro" value="{{ (isset($user)?$user->name:'') }}" tabindex="-1">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4 p-lr-o">

                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <label for="">Complemento</label>
                                    <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento"
                                        value="{{ (isset($user)?$user->name:'') }}" tabindex="5">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 p-lr-o">

                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <label for="">Cidade</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade"
                                        placeholder="Cidade" value="{{ (isset($user)?$user->name:'') }}" tabindex="-1">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-1 p-lr-o">

                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <label for="">UF</label>
                                    <input type="text" class="form-control" id="estado" name="estado" placeholder="UF"
                                        value="{{ (isset($user)?$user->name:'') }}" maxlength="2" tabindex="-1">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 p-lr-o">

                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                        value="{{ (isset($user)?$user->name:'') }}" tabindex="6">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-1 p-lr-o">
                            <div class="form-group">
                                <br><input type="submit" value="Salvar" class="btn btn-info pull-right" tabindex="7"
                                    id="salvar_canhoto">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<script>
$(document).ready(function() {

    function preencheDados(id) {


        $.ajax({
            url: "{{url('cliente')}}" + "/" + id,
            success: function(data) {
                $("#telefone").val(data.telefone);
                $("#cpf").val(data.cpf);
                $("#cep").val(data.cep);
                $("#nome").val(data.nome);
                $("#email").val(data.email);
                $("#endereco").val(data.endereco);
                $("#numero").val(data.numero);
                $("#bairro").val(data.bairro);
                $("#complemento").val(data.complemento);
                $("#cidade").val(data.cidade);
                $("#estado").val(data.uf);
                
                $("#cliente_id").val(data.id);

                
            }
        });



    }

    $("#cpf").blur(function() {
        if ($("#cpf").val() != "" && $("#cpf").val() != null) {
            preencheDados($("#cpf").val());
        }
    });
    
    $("#telefone").blur(function() {
        if ($("#telefone").val() != "" && $("#telefone").val() != null) {
            telefone = $("#telefone").val();
            telefone = telefone.replace(/[^\d]+/g,'');
            preencheDados(telefone);
        }
    });
    
});
</script>
@endsection