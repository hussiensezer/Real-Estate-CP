<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $table = "steps";
    protected $guarded = [];
    public $timestamps = true;

    public function  cityId() {
        return $this->belongsTo( City::class, 'city_id' , 'id');
    }
    public function groups() {
        return $this->hasMany( Group::class , 'group_id' ,'id');
    }
}
