<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Access extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'grade',
        'unique_num',
        'user_id',
        'course_id',
    ];
}
