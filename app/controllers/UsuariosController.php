<?php

class UsuariosController extends BaseController
{
    public function getIndex()
    {
        $usuarios = Usuario::get();
        return View::make('usuarios.index', compact('usuarios'));
    }

    public function getInserir()
    {
        $titulo = 'Add User';
        
        $usuario = new Usuario();
        
        return View::make('usuarios.inserir', compact('titulo', 'usuario'));
    }

    public function postInserir()
    {
        $usuario = new Usuario();

        $usuario->nome = Input::get('nome');
        $usuario->email = Input::get('email');
        $usuario->tipo = Input::get('tipo');
        $usuario->senha = Hash::make(Input::get('senha'));
        $usuario->acesso = 0;

        $usuario->save();

        return Redirect::to('/usuarios');
    }

    public function getEditar($id)
    {
        $usuario = Usuario::find($id);
        $titulo = 'Edit User';
        return View::make('usuarios.editar', compact('usuario', 'titulo'));
    }

    public function postEditar()
    {
        $usuario = Usuario::find(Input::get('id'));

        $usuario->nome = Input::get('nome');
        $usuario->email = Input::get('email');
        $usuario->tipo = Input::get('tipo');
        
        if(Input::get('senha'))
        {
            $usuario->senha = Hash::make(Input::get('senha'));
        }

        $usuario->save();

        return Redirect::to('/usuarios');
    }

    public function getRemover($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();

        if(Auth::user()->tipo == 'usuario'){
            $logout = new \HomeController();
            $logout->getSair();
        }

        return Redirect::to('/usuarios');
    }

    public function postCriar()
    {
        $usuario = new Usuario();

        $usuario->nome = Input::get('nome');
        $usuario->email = Input::get('email');
        $usuario->tipo = Input::get('tipo');
        $usuario->senha = Hash::make(Input::get('senha'));
        $usuario->acesso = 0;

        $usuario->save();

        // Autenticação
        if (Auth::attempt(array(
            'email' => Input::get('email'), 
            'password' => Input::get('senha')
            ), null))
        {
            $user = \Usuario::where('email', Input::get('email'))->first();
            $user->acesso = $user->acesso + 1;
            $user->save();

            return Redirect::to('usuarios');
        }
        else
        {
            return Redirect::to('entrar')
                ->with('flash_error', 1)
                ->withInput();
        }
    }

}
