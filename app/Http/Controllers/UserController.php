<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //dd('UserController@index'); //dd - debuga e mata a aplicação
        //return view('users/index'); // igual a linha de baixo
        $users = User::get();
        //dd($users);

        //return view('users/index'); // igual a linha de baixo
        //return view('users.index');

        //return view('users.index', [
        //    'users' => $users
        //]);

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        //dd('UserController@show', $id); //dd - debuga e mata a aplicação

        //$user = User::where('id', '=', $id)->first(); // passando '='
        //$user = User::where('id', $id)->first();
        if (!$user = User::find($id)) {
            //return redirect()->back();
            return redirect()->route('users.index');
        }

        //dd($user);
        return view('users.show', compact('user'));
    }
}
