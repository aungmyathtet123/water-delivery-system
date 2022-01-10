<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','voucher_no','order_date','total_price','shop_id','order_status'];

}
