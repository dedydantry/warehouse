<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public function categories()
    {
        return $this->belongsTo('App\Category');
    }

    public function brands()
    {
        return $this->belongsTo('App\Brand');
    }

    public function satuans()
    {
        return $this->belongsTo('App\Satuan');
    }

    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }
}
