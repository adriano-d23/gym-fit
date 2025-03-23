<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckIn extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'entry_date', 'exit_date'];
}