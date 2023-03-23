<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssociationMember extends Model
{
    use HasFactory;
    protected $guarded =['_token'];
    protected $casts = [
        'permanent_address'=>'array'
    ];

    public function educations(){
        return $this->hasMany(AssociationMemberEducation::class,'membership_id','id');
    }
    public function ocupation(){
        return $this->hasOne(AssociationMemberOcupation::class,'membership_id','id');
    }
}
