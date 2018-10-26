<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['category_name'];
    
    public function barang()
    {
        return $this->hasMany('App\Barang');
    }
}
