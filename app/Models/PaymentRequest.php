<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PaymentRequest extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'course', 'amount', 'reference_number', 'screenshot', 'confirmed', 'access_sent', 'expires_at',
    ];
}
