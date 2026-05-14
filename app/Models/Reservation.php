<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name',
        'service_type',
        'contact_number',
        'status',
        'queue_number',
    ];
}
