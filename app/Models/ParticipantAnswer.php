<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParticipantAnswer extends Model
{
	public $timestamps = false;
	
    protected $fillable = [
        'participant_id', 'question_id', 'answer_id', 'code'
    ];
}
