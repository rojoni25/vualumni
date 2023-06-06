<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $casts = [

        'statement'=>'array',
        'payment_date'=>'immutable_datetime',
        'confirmation_date'=>'immutable_datetime',
    ];

    public function member(){
        return $this->hasOne(AssociationMember::class,'id','member_id');
    }
    public function confirmedBy(){
        return $this->hasOne(user::class,'id','confirmed_by');
    }
}
