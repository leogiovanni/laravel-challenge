@extends('layouts.padrao')

@section('content')

    @if (Auth::user()->tipo == 'admin')

        <h1>Users</h1>

        <hr>    
        
        {{-- Verifica se existem usuarios --}}
        @if($usuarios->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Profile</th>
                        <th>Access</th>
                        <th width="25%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nome }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ ($usuario->tipo == 'admin'?'Manager':'User') }}</td>
                        <td>{{ $usuario->acesso }}</td>
                        <td>
                            <div class="btn-block">
                                <a href="{{ url('usuarios/editar', $usuario->id) }}" class="btn btn-primary btn-xs">
                                    <span class="glyphicon glyphicon-edit"></span>
                                    Edit
                                </a>
                                <a href="{{ url('usuarios/remover', $usuario->id) }}" class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-remove"></span>
                                    Remove
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h2>No users.</h2>
        @endif
    @else

        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Profile</th>
                        <th>Access</th>
                        <th width="25%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ Auth::user()->nome }}</td>
                        <td>{{ Auth::user()->email }}</td>
                        <td>{{ (Auth::user()->tipo == 'admin'?'Manager':'User') }}</td>
                        <td>{{ Auth::user()->acesso }}</td>
                        <td>
                            <div class="btn-block">
                                <a href="{{ url('usuarios/editar', Auth::user()->id) }}" class="btn btn-primary btn-xs">
                                    <span class="glyphicon glyphicon-edit"></span>
                                    Edit
                                </a>
                                <a href="{{ url('usuarios/remover', Auth::user()->id) }}" class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-remove"></span>
                                    Remove
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

    @endif
@stop