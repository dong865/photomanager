<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable=[
        'cn_name','name','describe','guard_name'
    ];
}
