<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;
    protected $table = 'timetable';
    protected $fillable = [
        'offering_id', 'lecturer_id', 'venue_id', 'trimester',
        'day_of_week', 'start_time', 'end_time',
        'class_type', 'class_group', 'week_type', 'is_locked', 'status',
    ];

    public function offering(){ return $this->belongsTo(CourseOffering::class, 'offering_id'); }
    public function lecturer(){ return $this->belongsTo(Lecturer::class); }
    public function venue(){ return $this->belongsTo(Venue::class); }
}
