<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey='id'; //получение информации о записи по ее id
    protected $table='comments';

    protected $fillable = [
        'text',
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
