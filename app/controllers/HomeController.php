<?php

class HomeController extends BaseController {

    public function getIndex()
    {
        return View::make('hello');
    }

    public function getEntrar()
    {
        $titulo = 'Entrar - Desenvolvendo com Laravel';
        return View::make('home/entrar', compact('titulo'));
    }

    public function postEntrar()
    {
        // Opção de lembrar do usuário
        $remember = false;
        if(Input::get('remember'))
        {
            $remember = true;
        }
        
        // Autenticação
        if (Auth::attempt(array(
            'email' => Input::get('email'), 
            'password' => Input::get('senha')
            ), $remember))
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
    
    public function getSair()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}