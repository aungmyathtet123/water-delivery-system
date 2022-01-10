<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    protected $fillable = ['shop_id','category_id','price'];
}
