<?php use App\Helpers; ?>
@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-card recent-activites">
			<div class="panel-heading">
				{{ ((isset($user))?'Editar':'Novo') }} canhoto
			</div>

			<div class="panel-body">

				<img src="{{ $canhotoScan->url }}">

						<form action="{{ url('/clientes') }}" method="post" enctype="multipart/form-data" class="form-edit" data-parsley-validate> 
					@csrf
					<br/>
					<div class="row">

						<div class="col-md-2 p-lr-o">

							<div class="col-sm-12 p-0">
								<div class="form-group">
									<label for="">Telefone</label>
									<input type="text" class="form-control" name="telefone" placeholder="(00) 0000-0000" required="" value="{{ (isset($user)?$user->name:'') }}" >
								</div>
							</div>
							
						</div>

						<div class="col-md-6 p-lr-o">
							
							<div class="col-sm-12 p-0">
								<div class="form-group">
									<label for=""> - </label>
									<input type="text" class="form-control" name="" placeholder=" - " required="" value="{{ (isset($user)?$user->name:'') }}" >
								</div>
							</div>
						</div>

						<div class="col-md-4 p-lr-o">
							
							<div class="col-sm-12 p-0">
								<div class="form-group">
									<label for="">Título</label>
									<input type="text" class="form-control" name="título" placeholder="00000" readonly="true" value="{{ $canhotoScan->bilhete }}" >
								</div>
							</div>
						</div>
					</div>

					<div class="row">

						<div class="col-md-2 p-lr-o">

							<div class="col-sm-12 p-0">
								<div class="form-group">
									<label for="">CPF</label>
									<input type="text" class="form-control" id="cpf" name="CPF" placeholder="000.000.000-00" required="" value="{{ (isset($user)?$user->name:'') }}" >
								</div>
							</div>
							
						</div>

						<div class="col-md-10 p-lr-o">
							
							<div class="col-sm-12 p-0">
								<div class="form-group">
									<label for="">Nome</label>
									<input type="text" class="form-control" id="nome" name="Nome" placeholder="Nome completo" required="" value="{{ (isset($user)?$user->name:'') }}" >
								</div>
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-md-2 p-lr-o">

							<div class="col-sm-12 p-0">
								<div class="form-group">
									<label for="">CEP</label>
									<input type="text" class="form-control" id="cep" name="CEP" placeholder="00000-000" required="" value="{{ (isset($user)?$user->name:'') }}" >
								</div>
							</div>
							
						</div>

						<div class="col-md-6 p-lr-o">
							
							<div class="col-sm-12 p-0">
								<div class="form-group">
									<label for="">Cidade</label>
									<input type="text" class="form-control" id="cidade" name="Cidade" placeholder="Cidade" required="" value="{{ (isset($user)?$user->name:'') }}" >
								</div>
							</div>
						</div>

						<div class="col-md-4 p-lr-o">
							
							<div class="col-sm-12 p-0">
								<div class="form-group">
									<label for="">Bairro</label>
									<input type="text" class="form-control" id="bairro" name="Bairro" placeholder="Bairro" required="" value="{{ (isset($user)?$user->name:'') }}" >
								</div>
							</div>
						</div>
					</div>

					<div class="row">

						<div class="col-md-6 p-lr-o">

							<div class="col-sm-12 p-0">
								<div class="form-group">
									<label for="">Endereço</label>
									<input type="text" class="form-control" id="endereco" name="endereco" placeholder="(Ex.: Rua, Trav, Est, Av)" required="" value="{{ (isset($user)?$user->name:'') }}" >
								</div>
							</div>
							
						</div>

						<div class="col-md-2 p-lr-o">
							
							<div class="col-sm-12 p-0">
								<div class="form-group">
									<label for="">Número</label>
									<input type="text" class="form-control" id="numero" name="Número" placeholder="000" required="" value="{{ (isset($user)?$user->name:'') }}" >
								</div>
							</div>
						</div>

						<div class="col-md-4 p-lr-o">
							
							<div class="col-sm-12 p-0">
								<div class="form-group">
									<label for="">Complemento</label>
									<input type="text" class="form-control" name="Complemento" placeholder="Complemento" required="" value="{{ (isset($user)?$user->name:'') }}" >
								</div>
							</div>
						</div>
					</div>

					<div class="row">

						<div class="col-md-4 p-lr-o">

							<div class="col-sm-12 p-0">
								<div class="form-group">
									<label for="">Email</label>
									<input type="text" class="form-control" name="Email" placeholder="Email" required="" value="{{ (isset($user)?$user->name:'') }}" >
								</div>
							</div>
							
						</div>

					</div>

					<div class="row">
						
							<div class="col-md-12 p-lr-o">
						<div class="form-group">
								<br><input type="submit" value="Salvar" class="btn btn-info pull-right">
							</div>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$("#cpf").blur( function() {
			if($("#cpf").val() != "" && $("#cpf").val() != null ){
				$.ajax({
  				url: "{{url("cliente")}}" + "/" + $("#cpf").val(),
   				success: function(data){

				$("#nome").val( data.nome );
   				}
		 	});
		}
		//Colocar para Telefone		
		$("#cpf").blur( function() {
			if($("#cpf").val() != "" && $("#cpf").val() != null ){
				$.ajax({
  				url: "{{url("cliente")}}" + "/" + $("#cpf").val(),
   				success: function(data){

				$("#nome").val( data.nome );
   				}
		 	});
		}	
	} );
});
</script>
@endsection