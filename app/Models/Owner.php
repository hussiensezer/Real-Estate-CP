<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = "owners";
    protected $guarded = [];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;

    public function apartment() {
        return $this->belongsTo(Apartment::class, 'apartment_id' , 'id');
    }
}
