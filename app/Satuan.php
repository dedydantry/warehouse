<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    public function satuans()
    {
        return $this->hasMany('App\Barang');
    }
}
