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
        'lecture_hours',
        'tutorial_hours',
        'practical_hours',
        'is_elective', 
        'required_choices', 
        'elective_pool_size',
        'course_category', 
        'is_active',
    ];
    public $timestamps = false;

    public function department(){ 
        return $this->belongsTo(Department::class); 
    }

    public function offerings(){ 
        return $this->hasMany(CourseOffering::class); 
    }
}
