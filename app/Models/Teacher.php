<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'specialization', 'registration_number', 'user_id', 'available_schedule'];
}