<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssociationMemberOcupation extends Model
{
    use HasFactory;
    protected $guarded =['_token'];
    protected $casts = [
        'from_date'=>'immutable_datetime',
        'to_date'=>'immutable_datetime',
    ];
}
