<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request)
    {
        $users = $this->model
                ->getUsers(
                    $search = $request->search ?? ''
                );
        //$users = $this->model->where('name', 'LIKE', "%{$request->search}%")->get();
        //$users = $this->model->where('name', 'LIKE', "%{$request->search}%")->toSql();
        //dd($users);

        //dd('UserController@index'); //dd - debuga e mata a aplicação
        //return view('users/index'); // igual a linha de baixo
        //$users = $this->model->get();
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

        //$user = $this->model->where('id', '=', $id)->first(); // passando '='
        //$user = $this->model->where('id', $id)->first();
        if (!$user = $this->model->find($id)) {
            //return redirect()->back();
            return redirect()->route('users.index');
        }

        //dd($user);
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        // $user = $this->model->create($data);
        $this->model->create($data);

        return redirect()->route('users.index');
        // return redirect()->route('users.show', $user->id);

        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();
    }

    public function edit($id)
    {
        if (!$user = $this->model->find($id)) {
            return redirect()->route('users.index');
        }

        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if (!$user = $this->model->find($id)) {
            return redirect()->route('users.index');
        }

        $data = $request->only('name', 'email');

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        if (!$user = $this->model->find($id)) {
            return redirect()->route('users.index');
        }

        $user->delete();

        return redirect()->route('users.index');
    }

}
