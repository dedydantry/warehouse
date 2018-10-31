<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'amount',
        'picker',
        'faktur_number',
        'remark',
        'status'
    ];

    

    public function order()
    {
        return $this->hasMany('App\Order', 'transaction_id');
    }
}
