@extends('layouts.padrao')

@section('content')

<h1>Add User</h1>

<hr>

{{ Form::open(array('url' => 'usuarios/inserir', 'class' => 'form-horizontal', 'role' => 'form')) }}

<div class="form-group">
    <label for="nome" class="col-lg-2 control-label">Name</label>
    <div class="col-lg-6">
        {{ Form::text('nome', $usuario->nome, array('class' => 'form-control', 'placeholder' => 'Name', 'required')) }}
    </div>
</div>

<div class="form-group">
    <label for="email" class="col-lg-2 control-label">Email</label>
    <div class="col-lg-6">
        {{ Form::email('email', $usuario->email, array('class' => 'form-control', 'placeholder' => 'Email', 'required')) }}
    </div>
</div>

<div class="form-group">
    <label for="senha" class="col-lg-2 control-label">Password</label>
    <div class="col-lg-6">
        {{ Form::password('senha', array('class' => 'form-control', 'placeholder' => 'Password', 'required')) }}
    </div>
</div>

<div class="form-group">
    <label for="tipo" class="col-lg-2 control-label">Profile</label>
    <div class="col-lg-6">
        {{ Form::select('tipo', array('admin' => 'Manager', 'usuario' => 'User'), $usuario->tipo, array('class' => 'form-control', 'placeholder' => 'Password', 'required')) }}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
        <a href="{{ url('usuarios') }}" title="Cancelar" class="btn btn-default">Cancel</a>
    </div>
</div>

{{ Form::close() }}

@stop
