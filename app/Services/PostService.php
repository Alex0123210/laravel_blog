<?php

namespace App\Services;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostService
{
    public function index()
    {
        return response(Post::all(), '200');
    }

    public function store(CreatePostRequest $request)
    {
        $post = new Post();
        $title = $request->get('title');
        $post->title = $title;
        $post->text = $request->text;
        $post->short_title = mb_strlen($title) > 30 ? mb_substr($title, 0, 30) . '...' : $title; // берем первые 30 символов и ставим три точки в конце, если title короткий, то берем title без трех точек....mb_strlen = \Illuminate\Support\Str::length
        $post->user_id = rand(1, 4);
        $post->save();
        return response($post, 201);
    }

    public function show($id)  //показывается страница одной конкретной записи и соединяется с пользователем
    {
        $post = Post::join('users', 'user_id', '=', 'users.id')
            ->find($id);
        return response($post, '200');


    }

    public function update(UpdatePostRequest $request, int $id)
    {
        $post = Post::find($id);
        $post->title = $request->get('title'); //перезаписывается заголовок
        $post->short_title = mb_strlen($request->title) > 30 ? mb_substr($request->title, 0, 30) . '...' : $request->title; // берем первые 30 символов и ставим три точки в конце, если title короткий, то берем title без трех точек....mb_strlen = \Illuminate\Support\Str::length
        $post->text = $request->get('text');; //перезаписывается описание
        $post->update(); //обновление информации
        return response($post, 204);
    }

    public function destroy(int $id) //удаление записи
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return response("Content with id=$id was be deleted", '202');
        } else {
            return response("No content with id=$id", '404');
        }
    }
}
