<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'wallets';
    
    protected $fillable = [
        'name', 'money', 'type_money', 'note','image','user_id',
    ];
}
