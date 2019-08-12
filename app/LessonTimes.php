<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonTimes extends Model
{
    protected $fillable = [
        'schedule_id',
        'week_day_id',
        'time_id'
    ];
}
