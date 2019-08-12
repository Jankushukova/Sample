<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonTimes extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'schedule_id',
        'week_day_id',
        'time_id'
    ];
}
