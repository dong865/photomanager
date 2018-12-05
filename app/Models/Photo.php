<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable=[
        'name','describe','cover'
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function picture()
    {
        return $this->hasMany('App\Models\Picture');
    }
}
