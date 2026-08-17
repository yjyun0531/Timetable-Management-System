<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerCourse extends Model
{
    use HasFactory;
    protected $table = 'lecturer_courses';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['lecturer_id', 'offering_id', 'class_group'];

    public function lecturer(){ return $this->belongsTo(Lecturer::class); }
    public function offering(){ return $this->belongsTo(CourseOffering::class, 'offering_id'); }
}
