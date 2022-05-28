<?php use App\Helpers; ?>
@if( ! Helper::temPermissao('empresas-listar') )
<script>window.location = "{{ url('/home') }}";</script>
@endif
@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-card recent-activites">
			<div class="panel-heading"></div>
			<div class="panel-body">
				<form action="{{ url('/lista') }}" method="post" enctype="multipart/form-data" class="form-edit" data-parsley-validate> 
					@csrf
					<div class="row">
						<div class="col-md-3 p-lr-o">
							<div class="form-group">
								<label for="">Usuário</label>
								<select class="form-control" name="user_id" required="">
									<option value="">Selecione</option>
									@foreach( $usuarios as $usuario )
									@php
										$s = '';
										if( isset($_GET['user_id']) and $_GET['user_id'] and $_GET['user_id'] == $usuario->id )
											$s = 'selected="selected"';
									@endphp
									<option value="{{ $usuario->id }}" {{$s}}>{{ $usuario->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-7 p-lr-o">
							<div class="form-group">
								<label for="">Enviar lista</label>
								<input type="file" class="form-control" name="lista" accept=".txt" required="">
							</div>
						</div>
						<div class="col-md-2 p-lr-o">
							<div class="form-group" style="padding-top: 5px;">
								<br><input type="submit" value="Enviar" class="btn btn-success btn-block">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection