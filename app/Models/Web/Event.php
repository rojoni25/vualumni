<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $casts = [
        'event_start' => 'immutable_datetime',
        'event_end' => 'immutable_datetime',
        'registration_start' => 'immutable_datetime',
        'registration_end' => 'immutable_datetime',
    ];
}
