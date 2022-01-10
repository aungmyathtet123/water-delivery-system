<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    protected $fillable = ['amount','size','price','shop_id','image'];
}
