<?php

namespace App\Models\Comment;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['comment_id', "user_id", 'thread_id', 'comment', 'image'];

}
