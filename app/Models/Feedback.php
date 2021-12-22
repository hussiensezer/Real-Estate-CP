<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = "feedback";
    protected $guarded = [];
    public $timestamps = true;

    public function user() {
        return $this->belongsTo( User::class, 'user_id', 'id')->select(['id', 'name']);
    }
    public function apartment() {
        return $this->belongsTo(Apartment::class, 'apartment_id', 'apartment_code');
    }
}
