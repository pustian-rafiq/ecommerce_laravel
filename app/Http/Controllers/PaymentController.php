<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class PaymentController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function PaymentProcess(Request $request){
    	$payment = $request->payment;
    	echo $payment;
    }
}
