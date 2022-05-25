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
						<div class="col-md-10 p-lr-o">
							<div class="form-group">
								<label for="">Enviar lista</label>
								<input type="file" class="form-control" name="lista" accept=".txt" required="">
							</div>
						</div>
						<div class="col-md-2 p-lr-o">
							<div class="form-group">
								<br><input type="submit" value="Enviar" class="btn btn-info pull-right">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection