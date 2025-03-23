<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'active', 'amount', 'payment_date', 'payment_method', 'status_id'];
}
