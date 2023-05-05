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

    protected $hidden = ['division', 'district', 'upazila', 'batch'];

    function divisiondata()
    {
        return $this->belongsTo(Division::class, 'division', 'id');
    }

    function districtdata()
    {
        return $this->belongsTo(District::class, 'district', 'id');
    }

    function upaziladata()
    {
        return $this->belongsTo(Upazila::class, 'upazila', 'id');
    }
    function batchdata()
    {
        return $this->belongsTo(Batch::class, 'batch', 'id');
    }


    static  function scopeSearch()
    {
        $search = request('search');

        return self::where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('educational_qualification', 'LIKE', '%' . $search . '%')
            ->orWhere('date_of_birth', 'LIKE', '%' . $search . '%')
            ->orWhereHas('districtdata', function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%');
            })
            ->orWhere('working_from', 'LIKE', '%' . $search . '%')
            ->orWhere('appointed', 'LIKE', '%' . $search . '%')
            ->orWhere('currentPosting', 'LIKE', '%' . $search . '%')
            ->orWhere('previousposting', 'LIKE', '%' . $search . '%')
            ->orWhere('bloodgroup', 'LIKE', '%' . $search . '%')
            ->orWhere('mobile', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->orWhereHas('divisiondata', function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('upaziladata', function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('batchdata', function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%');
            })
            ->with(['divisiondata:id,name', 'districtdata:id,name', 'upaziladata:id,name', 'batchdata:id,name'])->get();
    }
}
