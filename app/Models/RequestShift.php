<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestShift extends Model
{
    use HasFactory;

    public function staff(){
        return $this->belongsTo('App\Models\Staff');
    }

    public function store(){
        return $this->belongsTo('App\Models\Store');
    }
}
