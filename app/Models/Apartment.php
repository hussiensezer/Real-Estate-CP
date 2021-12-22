<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = "apartments";
    protected $guarded = [];
    public $timestamps = true;

    public function cityId() {
        return $this->belongsTo(City::class, 'city_id' ,'id')
            ->select(['id','city']);
    }
    public function stepId() {
        return $this->belongsTo(Step::class, 'step_id' ,'id')
            ->select(['id','name']);
    }
    public function groupId() {
        return $this->belongsTo(Group::class, 'group_id' ,'id')
            ->select(['id','name']);
    }
    public function userId() {
        return $this->belongsTo(User::class, 'user_id' ,'id')
            ->select(['id','name']);
    }

    public function sell() {
        return $this->hasOne(SellApartment::class, 'apartment_id' , 'id');
    }// End Sell

    public function rent() {
        return $this->hasOne(Rent::class,'apartment_id' , 'id');
    }// End Sell

    public function owner() {
        return $this->hasOne(Owner::class,'apartment_id' , 'id');
    }// End Owner

    public function mediator() {
        return $this->hasOne(Mediator::class,'apartment_id' , 'id');
    }// End Owner

    public function images() {
        return $this->hasMany(Attachment::class,'apartment_id', 'id')
            ->where("type" , '=','image')->select(['id','path','type','status','apartment_id']);
    }// End Images

    public function media() {
        return $this->hasMany(Attachment::class,'apartment_id', 'id')
            ->where("type" , '=','video')->select(['id','path','type','status','apartment_id']);
    }// End Images

    public function feedback() {
        return $this->hasMany(Feedback::class, 'apartment_code', 'serial_no');
    }


}
