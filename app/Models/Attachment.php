<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = "attachments";
    protected $guarded = [];
    public $timestamps = true;

    public function apartment() {
        return $this->belongsTo(Apartment::class, 'apartment_id', 'id');
    }
}
