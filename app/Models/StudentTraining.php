<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentTraining extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'teacher_id', 'goal', 'creation_date', 'status_id'];
}