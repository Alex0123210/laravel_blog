<?php

namespace App\Services;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;

class CommentService
{
    public function index()
    {
        return response (Comment::all(),'200');
    }

    public function show($id)
    {
        return Comment::join('posts','post_id','=','posts.id')->find($id);
    }
    public function store(CreateCommentRequest $request)
    {
        $comment=new Comment();
        $text = $request->get('text');
        $comment->text= $text;
        $comment->user_id=rand(1,6);
        $comment->post_id=rand(1,16);
        $comment->save();
        return response ($comment,201);
    }

    public function update(UpdateCommentRequest $request, $id)
    {
        $comment = Comment::find($id);
        $comment->text = $request->get('text');; //перезаписывается описание
        $comment->update(); //обновление информации
        return response($comment,204);

    }
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if($comment)
        {
            $comment->delete();
            return response("Content with id=$id was be deleted", '202');
        }
        else
        {
            return response("No content with id=$id", '404');
        }
    }
}
