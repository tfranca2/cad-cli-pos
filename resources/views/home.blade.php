<?php use App\Helpers; ?>
@extends('layouts.app')
@section('content')
<div class="row justify-content-center" style="background: url('{{ url("/public/images/". \Auth::user()->empresa()->main_logo ) }}') no-repeat center /contain; height: 190px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body"><br></div>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        </div>
    </div>

    @if( Helper::temPermissao('lista-gerenciar') )
    <div class="row">
        <div class="col-md-12">
            <div class="panel short-states bg-5">
                <div class="card-header m-5">
                    <b>Total - <span id="feito"></span> / <span id="total"></span> </b>
                </div>
                <div class="card-body">
                    <div class="progress" id="barra">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    <div class="row">
        @foreach( $usuarios as $usuario )
        <div class="col-md-6">
            <div class="panel short-states bg-5">
                <div class="card-header m-5">
                    <b>{{ $usuario->name }} - <span id="f_{{$usuario->id}}"></span> / <span id="t_{{$usuario->id}}"></span> </b> 
                    <a href="{{ url( 'lista?user_id='.$usuario->id ) }}" title="Adicionar lista ao usuário" class="btn btn-success btn-rounded"><i class="fa fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <div class="progress" id="b_{{$usuario->id}}">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                    </div>
                </div>                
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="col-md-6">
        <div class="panel short-states bg-5">
            <div class="card-header m-5">
                <b>{{ $user->name }} - <span id="f_{{$user->id}}"></span> / <span id="t_{{$user->id}}"></span> </b>
            </div>
            <div class="card-body">
                <div class="progress" id="b_{{$user->id}}">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                </div>
            </div>                
        </div>
    </div>
    @endif
</div>
<style>

    .short-states h1 {
        color: inherit !important;
        margin-top: 0px;
    }

    .short-states {
        text-align: center;
    }

    .state-icon {
        position: absolute;
        right: 0;
    }
    
    small {
        font-size: 70%;
    }
    
    .ui-content-body {
        margin-bottom: 0px !important;
    }

    #content {
        /*background: url('{{ url('/public/images/'. \Auth::user()->empresa()->main_logo ) }}') no-repeat 50% 40%;*/
    }
    @media (max-width: 812px) {
        #content {
            background-size: 60%;
            background-position: 50%;
        }
    }
    @media (max-width: 400px) {
        #content {
            background: url('{{ url('/public/images/'. \Auth::user()->empresa()->main_logo ) }}') no-repeat 50% 39%;
            background-size: 90%;
        }
    }
</style>
@endsection
@section('script')
<script>
    $(document).ready(function(){

        function progress(){
            $.ajax({
                type: "GET",
                url: "{{ url('lista/progresso') }}",
                async: true,
            }).done(function(obj) {
                $("#barra > .progress-bar").html( obj.porcentagem.toFixed(2) + "%" ).css({ "width": obj.porcentagem.toFixed(2) + "%" });
                $("#feito").html( obj.feito );
                $("#total").html( obj.total );
            });
        }

        function progress_user( user_id ){
            $.ajax({
                type: "GET",
                url: "{{ url('usuario') }}/"+ user_id +"/progresso",
                async: true,
            }).done(function(obj) {
                $("#b_"+ user_id +" > .progress-bar").html( obj.porcentagem.toFixed(2) + "%" ).css({ "width": obj.porcentagem.toFixed(2) + "%" });
                $("#f_"+ user_id).html( obj.feito );
                $("#t_"+ user_id).html( obj.total );
            });
        }

        @if( Helper::temPermissao('lista-gerenciar') )
        progress();
        setInterval(function(){ progress() }, 5000);
        @foreach( $usuarios as $usuario )
        progress_user({{ $usuario->id }});
        setInterval(function(){ progress_user({{ $usuario->id }}) }, 5000);
        @endforeach
        @else
        progress_user({{ $user->id }});
        @endif

    });
</script>
@endsection