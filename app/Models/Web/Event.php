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

    public function registration_date(){
        $registration_start = $this->registration_start->format('d-m-Y H:i:s');
        $registration_end = $this->registration_end->format('d-m-Y H:i:s');
        return $registration_start.' to '.$registration_end;
    }
    public function event_date(){
        $event_start = $this->event_start->format('d-m-Y H:i:s');
        $event_end = $this->event_end->format('d-m-Y H:i:s');
        return $event_start.' to '.$event_end;
    }
}
