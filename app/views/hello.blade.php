@extends('layouts.padrao')

@section('content')

@if(empty(Auth::user()))

	<h1>Create new account</h1>

	<hr>

	{{ Form::open(array('url' => 'criar', 'class' => 'form-horizontal', 'role' => 'form')) }}

	<div class="form-group">
	    <label for="nome" class="col-lg-2 control-label">Nome</label>
	    <div class="col-lg-6">
	        {{ Form::text('nome', '', array('class' => 'form-control', 'placeholder' => 'Name')) }}
	    </div>
	</div>

	<div class="form-group">
	    <label for="email" class="col-lg-2 control-label">E-mail</label>
	    <div class="col-lg-6">
	        {{ Form::email('email', '', array('class' => 'form-control', 'placeholder' => 'Email')) }}
	    </div>
	</div>

	<div class="form-group">
	    <label for="senha" class="col-lg-2 control-label">Senha</label>
	    <div class="col-lg-6">
	        {{ Form::password('senha', array('class' => 'form-control', 'placeholder' => 'Password')) }}
	    </div>
	</div>

	<div class="form-group" style="display: none;">
	    <label for="tipo" class="col-lg-2 control-label">Tipo</label>
	    <div class="col-lg-6">
	        {{ Form::select('tipo', array('usuario' => 'User'), array('class' => 'form-control', 'placeholder' => 'Password')) }}
	    </div>
	</div>

	<div class="form-group">
	    <div class="col-lg-offset-2 col-lg-10">
	        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
	        <a href="{{ url('usuarios') }}" title="Cancelar" class="btn btn-default">Cancel</a>
	    </div>
	</div>

	{{ Form::close() }}

@else	
	<h1>Welcome</h1>
@endif

@stop
