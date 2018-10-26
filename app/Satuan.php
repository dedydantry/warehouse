<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{

    protected $fillable = ['satuan_name'];

    public function satuans()
    {
        return $this->hasMany('App\Barang');
    }
}
