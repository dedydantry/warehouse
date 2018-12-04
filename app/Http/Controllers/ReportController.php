<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Transaction;
use App\Order;
use App\Http\Resources\OrderResource;

class ReportController extends Controller
{
    public function transaction(Request $request, $status)
    {
        $status = strtoupper($status);
        $ar = [];
        if($request->get('periode')){
            $ar = explode('-', $request->get('periode'));
        } else {
            $ar =[date('Y'), date('m')];
        }
        $transaction = Transaction::select('id')
                        ->where('status', $status)
                        ->whereYear('picker', '=', $ar[0])
                        ->whereMonth('picker', '=', $ar[1])
                        ->get();

        $order = Order::whereIn('transaction_id', $transaction)
                        ->orderBy('id', 'DESC')
                        ->limit(50)
                        ->get();
       return OrderResource::collection($order);
        
    }
}
