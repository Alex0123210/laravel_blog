<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $primaryKey='id'; //получение информации о записи по ее id
    protected $table='posts';
    protected $fillable = [
        'title',
        'text',
        'img'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,'comment_id');
    }



}
