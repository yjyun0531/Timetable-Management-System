<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseOffering extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'batch_code',
        'trimester',
        'num_students',
        'is_shared_programme',
    ];
    public $timestamps = false;

    public function course(){ return $this->belongsTo(Course::class); }
}
