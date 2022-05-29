<?php use App\Helpers; ?>
@extends('layouts.app')
@section('content')

<style>
#canhoto_atual {
    margin: auto;
    display: block;
    max-height: 250px;
    max-width: 80%;
}

#canhoto_carrega {
    background: url("{{url('assets/imgs/loading.gif')}}") no-repeat center;
    background-size: contain;
    min-height: 100px;
    width: 100%;
}

.ui-content-body {
    margin-bottom: 0;
    padding-bottom: 0;
}

#salvar_canhoto {
    /*margin-top: 5px;*/
}

#salvar_canhoto:focus {
    box-shadow: -1px -1px 10px #003a62 !important;
}

.form-group {
    margin-bottom: 5px;
}
.form-group > label {
    margin-bottom: 0;
}
</style>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card recent-activites">
            <div class="panel-body">

                <div id="canhoto_carrega">
                    <a href="{{ $canhotoScan->url }}" data-lightbox="canhoto"><img src="{{ $canhotoScan->url }}" id="canhoto_atual"></a>
                </div>

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
                                    <input type="text" class="form-control telefone" id="telefone" name="telefone" placeholder="(00) 0 0000-0000" value="{{ (isset($user)?$user->name:'') }}" maxlength="16" tabindex="1" required="">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 p-lr-o">

                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <label for="">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf"
                                        placeholder="000.000.000-00" value="{{ (isset($user)?$user->name:'') }}"
                                        maxlength="14" data-parsley-cpf="true" tabindex="2" required="">
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

                        <div class="col-md-6 p-lr-o">

                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <label for="">Complemento</label>
                                    <input type="text" class="form-control" id="complemento" name="complemento"
                                        placeholder="Complemento" value="{{ (isset($user)?$user->name:'') }}"
                                        tabindex="5">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 p-lr-o">

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

                    </div>

                    <div class="row">

                        <div class="col-md-6 p-lr-o">

                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <label for="">Vendedor</label>
                                    <input type="text" class="form-control" id="vendedor" name="vendedor"
                                        placeholder="Vendedor" value="{{ (isset($user)?$user->name:'') }}" tabindex="6" required="">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 p-lr-o">

                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                        value="{{ (isset($user)?$user->name:'') }}" tabindex="7">
                                </div>
                            </div>

                        </div>

                        <div class="col-md-1 p-lr-o">
                            <div class="form-group">
                                <br><input type="submit" value="Salvar" class="btn btn-info pull-right" tabindex="8"
                                    id="salvar_canhoto">
                            </div>
                        </div>

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

    function scrollToBottom() {
        window.scrollTo(0, document.body.scrollHeight);
    }
    history.scrollRestoration = "manual";
    window.onload = scrollToBottom;

    function preencheDados(id) {
        if( id.replace(/[^\d]+/g, '') ){
        $.ajax({
            url: "{{url('cliente')}}" + "/" + id,
            success: function(data) {

                if( data.telefone )
                    $("#telefone").val(data.telefone);
                if( data.cpf )
                    $("#cpf").val(data.cpf);
                if( data.cep )
                    $("#cep").val(data.cep);
                if( data.nome )
                    $("#nome").val(data.nome);
                if( data.email )
                    $("#email").val(data.email);
                if( data.endereco )
                    $("#endereco").val(data.endereco);
                if( data.numero )
                    $("#numero").val(data.numero);
                if( data.bairro )
                    $("#bairro").val(data.bairro);
                if( data.complemento )
                    $("#complemento").val(data.complemento);
                if( data.cidade )
                    $("#cidade").val(data.cidade);
                if( data.uf )
                    $("#estado").val(data.uf);

                $("#cliente_id").val(data.id);
            }
        });
        }
    }

    $("#cpf").blur(function() {
        if ($("#cpf").val() != "" && $("#cpf").val() != null) {
            preencheDados($("#cpf").val());
        }
    });

    $("#telefone").blur(function() {
        if ($("#telefone").val() != "" && $("#telefone").val() != null) {
            telefone = $("#telefone").val().replace(/[^\d]+/g, '');
            preencheDados(telefone);
        }
    });

    // submete o formulario apertando 'Enter', quando o submit está em foco
    $(".form-edit").on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if( keyCode === 13 ){ 
            $(".form-edit").submit();
        }
    });

    $('#telefone').on('keyup keypress', function(e){
        telefone = $('#telefone').val().replace(/[^\d]+/g, '');
        if( telefone )
            $('#cpf').removeAttr('required');
        else
            $('#cpf').attr('required', true);
    });

    $('#cpf').on('keyup keypress', function(e){
        cpf = $('#cpf').val().replace(/[^\d]+/g, '');
        if( cpf )
            $('#telefone').removeAttr('required');
        else
            $('#telefone').attr('required', true);
    });

});
</script>
@endsection