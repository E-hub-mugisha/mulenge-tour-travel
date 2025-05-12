<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function showCheckout()
    {
        return view('checkout');
    }

    public function inlinePayment(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'amount' => 'required|numeric|min:1',
        ]);

        $reference = 'TRX_' . Str::random(10);

        return view('inline_checkout', [
            'email' => $validated['email'],
            'amount' => $validated['amount'],
            'tx_ref' => $reference,
            'public_key' => env('FLW_PUBLIC_KEY'),
            'redirect_url' => route('payment.callback'),
        ]);
    }

    public function paymentCallback(Request $request)
    {
        $status = $request->query('status');

        if ($status === 'successful') {
            return redirect()->route('checkout')->with('success', 'Payment successful!');
        } elseif ($status === 'cancelled') {
            return redirect()->route('checkout')->with('error', 'Payment cancelled!');
        } else {
            return redirect()->route('checkout')->with('error', 'Payment failed!');
        }
    }
}
