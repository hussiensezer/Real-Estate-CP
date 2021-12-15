<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mediator extends Model
{
    protected $table = "mediators";
    protected $guarded = [];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;

    public function apartment() {
        return $this->belongsTo(Apartment::class, 'apartment_id' , 'id');
    }
}
