<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'name', 'gender', 'email', 'phone_number', 'date_of_birth', 'address', 'result', 'created_at', 'updated_at',
    ];
}
