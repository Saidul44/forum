<?php

namespace App\Models\Topic;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';

    protected $fillable = ["name","description"];

}
