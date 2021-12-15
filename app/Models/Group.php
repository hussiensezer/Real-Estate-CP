<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = "groups";
    protected $guarded = [];
    public $timestamps = true;

    public function stepId() {
        return $this->belongsTo(Step::class, 'step_id', 'id')->select(['id','name']);
    }
    public  function cityId() {
        return $this->belongsTo(City::class, 'city_id', 'id')->select(['id','city']);
    }

}
