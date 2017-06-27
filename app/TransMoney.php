<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransMoney extends Model
{
    protected $table = 'trans_moneys';
    protected $fillable = [
        'name', 'note','image','category_id','wallet_id','money','type_money',
    ];
}
