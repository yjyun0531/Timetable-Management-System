<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_id',
        'course_code',
        'course_name',
        'description',
        'trimester_offered',
        'lecture_hours',
        'tutorial_hours',
        'practical_hours',
        'num_students',
        'is_active',
    ];
    public $timestamps = false;

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
