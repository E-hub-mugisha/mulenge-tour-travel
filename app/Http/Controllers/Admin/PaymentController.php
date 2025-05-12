<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourPayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = TourPayment::all();
        return view('admin.payments.index', compact('payments'));
    }
    public function refundAdminStatus($id)
    {
        $payment = TourPayment::findOrFail($id);
        $payment->status = 'refund';
        $payment->save();

        return redirect()->back()->with('success', 'payment refund initiated successfully!');
    }
    public function cancelAdminStatus($id)
    {
        $payment = TourPayment::findOrFail($id);
        $payment->status = 'cancelled';
        $payment->save();

        return redirect()->back()->with('success', 'payment status cancelled successfully!');
    }
}
