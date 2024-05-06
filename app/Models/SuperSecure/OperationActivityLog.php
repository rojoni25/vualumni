<?php

namespace App\Models\SuperSecure;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class OperationActivityLog extends Model
{
    use HasFactory;
    use Notifiable;
}
