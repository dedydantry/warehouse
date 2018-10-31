<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'part_number', 
        'description', 
        'category_id', 
        'brand_id', 
        'satuan_id',
        'price',
        'cover',
        'stok',
    ];

    public function categories()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function brands()
    {
        return $this->belongsTo('App\Brand', 'brand_id');
    }

    public function satuans()
    {
        return $this->belongsTo('App\Satuan', 'satuan_id');
    }

    public function order()
    {
        return $this->hasMany('App\Order',  'barang_id');
    }

    // public function transaction()
    // {
    //     return $this->hasManyThrough('App\Transaction', 'App\Order');
    // }
}
