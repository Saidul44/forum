<?php

namespace App\Models\Thread;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'threads';

    protected $fillable = ["user_id","topic_id", 'title', 'body', 'photo'];

}
