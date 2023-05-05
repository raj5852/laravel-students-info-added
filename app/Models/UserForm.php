<?php

namespace App\Models;

use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserForm extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $hidden = ['division','district','upazila','batch'];

    function divisiondata(){
        return $this->belongsTo(Division::class,'division','id');
    }

    function districtdata(){
        return $this->belongsTo(District::class,'district','id');
    }

    function upaziladata(){
        return $this->belongsTo(Upazila::class,'upazila','id');
    }
    function batchdata(){
        return $this->belongsTo(Batch::class,'batch','id');
    }


}
