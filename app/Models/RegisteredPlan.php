<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegisteredPlan extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'plan_id', 'active'];
}