<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssociationMember extends Model
{
    use HasFactory;
    protected $guarded =['_token'];
    protected $casts = [
        'permanent_address'=>'array',
        'remarks'=>'array',
        'dob'=>'immutable_datetime',
    ];

    public function educations(){
        return $this->hasMany(AssociationMemberEducation::class,'membership_id','id');
    }
    public function educationsDesc(){
        return $this->hasMany(AssociationMemberEducation::class,'membership_id','id')->orderByDesc('year');
    }
    public function ocupation(){
        return $this->hasOne(AssociationMemberOcupation::class,'membership_id','id');
    }
    public function ocupationsDesc(){
        return $this->hasMany(AssociationMemberOcupation::class,'membership_id','id')->orderByDesc('from_date');
    }
    public function user(){
        return $this->hasOne(User::class,'email','email');
    }
    public function membership_info(){
        return $this->hasOne(MembershipType::class,'title','membership_type');
    }
    public function registrationPayment(){
        return $this->hasOne(Payments::class,'member_id','id')->where('payment_for','Registration');
    }
}
