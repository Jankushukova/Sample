<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    const ADMIN_ID = 1;
    const MANAGER_ID = 2;
    const CLIENT_ID = 3;

    protected $fillable = [
        'name'
    ];
}
