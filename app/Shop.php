<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['name','address','phone','township_id','image','service_id'];

    
}
