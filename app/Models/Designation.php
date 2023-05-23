<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    protected $guarded = [];

    function users(){
        return $this->hasMany(UserForm::class,'designation','id');
    }

}


// 6
