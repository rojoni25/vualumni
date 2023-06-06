<?php

namespace App\Models\Web;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user(){
        return $this->hasOne(User::class);
    }
    public function addedBy(){
        return $this->hasOne(User::class,'id','added_by');
    }
}
