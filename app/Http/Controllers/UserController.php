<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //dd('UserController@index'); //dd - debuga e mata a aplicação
        //return view('users/index'); // igual a linha de baixo
        return view('users.index');
    }

    public function show($id)
    {
        dd('UserController@show', $id); //dd - debuga e mata a aplicação
    }
}
