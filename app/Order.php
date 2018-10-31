<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =[
        'transaction_id',
        'barang_id',
        'amount'
    ];

    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }

    public function barang()
    {
        return $this->belongsTo('App\Barang', 'barang_id');
    }

    public static function multiInsert($params, $transaction, $status)
    {
        $array = [];
        $data = json_encode($params);
        $arr = json_decode($data);
        foreach ($arr as $key => $value) {
            $array[$key]['transaction_id'] =  $transaction;
            $array[$key]['barang_id'] = $value->id;
            $array[$key]['amount'] = $value->count;
            
            $barang = \App\Barang::findOrFail($value->id);
            if($status == 'IN'){
                $barang->stok = ($barang->stok + $value->count);
            } else {
                $barang->stok = ($barang->stok - $value->count);
            }
            $barang->save();
        }
        
        $order = new static;
        return $order::insert($array);
    }
}
