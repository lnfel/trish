<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Luigel\Paymongo\Facades\Paymongo;

class EWalletPaymentController extends Controller
{
    public function pay(Request $request)
    {
    	$source = Paymongo::source()->create([
    		'type' => $request->type,
    		'amount' => $request->amount,
    		'currency' => 'PHP',
    		'redirect' => [
    			'success' => route('appointments.index', ['success' => true]),
    			'failed' => route('appointments.index', ['success' => false])
    		],
    		'billing' => [
    			'name' => $request->user()->name,
    			'email' => $request->user()->email,
    		]
    	]);
    	//dd($source->getRedirect()['checkout_url']);
    	return redirect($source->getRedirect()['checkout_url']);
    }
}
