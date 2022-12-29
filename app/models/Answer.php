<?php

namespace Models;

use \Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    protected $fillable = [
        'answer',
        'user_id',
        'question_id'
    ];
}
