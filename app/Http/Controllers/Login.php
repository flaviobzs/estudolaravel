<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use Request;
use Auth;

class Login extends Controller
{
    public function login(){
        return view('login');
    }

    public function acesso(){
        //credenciais
        $credenciais = Request::only('email', 'password');

        //attempt - verifica e ja loga o usuario
        //validate - só verifica sem logar
        if(Auth::attempt($credenciais)){
            return 'usuario logado';
        } return 'usuario não existe';

        //retornar a view
    }
}
