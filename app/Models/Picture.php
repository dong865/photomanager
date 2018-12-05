<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable=[
        'image','photo_id','admin_id'
    ];

    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
}
