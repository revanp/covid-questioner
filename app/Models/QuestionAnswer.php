<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
	public $timestamps = false;

    protected $fillable = [
        'question_id', 'answer', 'score', 'code'
    ];
}
