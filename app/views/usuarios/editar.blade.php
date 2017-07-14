@extends('layouts.padrao')

@section('content')

<h1>Edit User</h1>

<hr>

{{ Form::open(array('url' => 'usuarios/editar', 'class' => 'form-horizontal', 'role' => 'form')) }}

<div class="form-group">
    <label for="nome" class="col-lg-2 control-label">Name</label>
    <div class="col-lg-6">
        {{ Form::text('nome', $usuario->nome, array('class' => 'form-control', 'placeholder' => 'Name')) }}
    </div>
</div>

<div class="form-group">
    <label for="email" class="col-lg-2 control-label">Email</label>
    <div class="col-lg-6">
        {{ Form::email('email', $usuario->email, array('class' => 'form-control', 'placeholder' => 'Email')) }}
    </div>
</div>

<div class="form-group">
    <label for="senha" class="col-lg-2 control-label">Password</label>
    <div class="col-lg-6">
        {{ Form::password('senha', array('class' => 'form-control', 'placeholder' => 'Password')) }}
        <div class="help-block">Leave blank if you do not want to update.</div>
    </div>
</div>

@if(Auth::user()->tipo == 'admin')
<div class="form-group">
    <label for="tipo" class="col-lg-2 control-label">Profile</label>
    <div class="col-lg-6">
        {{ Form::select('tipo', array('admin' => 'Manager', 'usuario' => 'User'), $usuario->tipo, array('class' => 'form-control', 'placeholder' => 'Senha')) }}
    </div>
</div>
@elseif(Auth::user()->tipo == 'usuario')
<div class="form-group" style="display: none;">
    <label for="tipo" class="col-lg-2 control-label">Profile</label>
    <div class="col-lg-6">
        {{ Form::select('tipo', array('usuario' => 'User'), $usuario->tipo, array('class' => 'form-control', 'placeholder' => 'Password')) }}
    </div>
</div>
@endif

{{ Form::hidden('id', $usuario->id) }}

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
        <a href="{{ url('usuarios') }}" title="Cancelar" class="btn btn-default">Cancel</a>
    </div>
</div>

{{ Form::close() }}

@stop
