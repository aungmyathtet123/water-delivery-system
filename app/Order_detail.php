<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $fillable = ['item_id','voucher_no','qty','price','shop_id','status'];

}
