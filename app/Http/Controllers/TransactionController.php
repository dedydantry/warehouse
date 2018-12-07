<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Transaction;
use App\Order;
use App\Http\Resources\TransactionResource;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = strtoupper($request->get('status'));
        $transaction = Transaction::where('status', $status)->paginate(15);
        return TransactionResource::collection($transaction);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = new Transaction;
        $transaction->picker = $request->get('picker');
        $transaction->faktur_number = $request->get('faktur_number');
        $transaction->remark = $request->get('remark');
        $transaction->supplier = $request->get('supplier');
        $transaction->status = strtoupper($request->get('status'));

        if($transaction->save()){
            $order = Order::multiInsert($request->get('barang'), $transaction->id, strtoupper($request->get('status')));
            return new TransactionResource($transaction);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::with('order')->find($id);

        return new TransactionResource($transaction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->picker = $request->get('picker');
        $transaction->faktur_number = $request->get('faktur_number');
        $transaction->remark = $request->get('remark');
        $transaction->supplier = $request->get('supplier');
        if($transaction->save() && count($request->get('order'))){
            $order = Order::multiInsert($request->get('order'), $transaction->id, strtoupper($transaction->status));
            return new TransactionResource($transaction);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
