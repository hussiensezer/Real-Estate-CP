<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $table = "rents";
    protected $guarded = [];
    public $timestamps = true;
    protected $hidden = ['created_at','updated_at'];


    public function apartment() {
        return $this->belongsTo(Apartment::class, 'apartment_id' , 'id');
    }
}
