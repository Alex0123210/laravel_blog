<?php

namespace App\Services;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    public function index()
    {
        return response (User::all());
    }

    public function store(CreateUserRequest $request)
    {
        $user=new User();
        $name = $request->get('name');
        $user->name= $name;
        $user->email= $request->email;
        $user->password=$request->password;
        $user->save();
        return response ($user,201);
    }

    public function show($id)
    {
        $user=User::find($id)->with('posts')
           ->where('id', '=', $id)->get();
        return response ($user,'200');
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user=User::find($id);
        $user->name=$request->get('name'); //перезаписывается заголовок
        $user->email=$request->get('email'); //перезаписывается короткий заголовок
        $user->password=$request->get('password'); //перезаписывается описание
        $user->update(); //обновление информации
        return response ($user,204);
    }
}
