<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Raziul\Sslcommerz\Facades\Sslcommerz;

class SslcommerzController extends Controller
{
    public function paymentForm()
    {
        return view('payment.form');
    }

    public function payment(Request $request)
    {
        $amount = $request->amount;
        $invoiceId = uniqid(); // ট্রান্সেকশন ID
        $productName = 'Test Product';

        $customerName = 'Demo User';
        $customerEmail = 'demo@example.com';
        $customerPhone = '01772941135';

        $itemsQuantity = 1;
        $address = 'Dhaka, Bangladesh';

        $response = Sslcommerz::setOrder($amount, $invoiceId, $productName)
            ->setCustomer($customerName, $customerEmail, $customerPhone)
            ->setShippingInfo($itemsQuantity, $address)
            ->makePayment();

        if ($response->success()) {
            return redirect($response->gatewayPageURL());
        } else {
            return back()->with('error', 'পেমেন্ট শুরু করা যায়নি, অনুগ্রহ করে পরে আবার চেষ্টা করুন।');
        }
    }

    public function success(Request $request)
    {
        // Payment Success Handling
        // return 'Payment Successful!';
        return view('welcome');
    }

    public function failure(Request $request)
    {
        // return 'Payment Failed!';
        return view('welcome');
    }

    public function cancel(Request $request)
    {
        return 'Payment Cancelled!';
    }
}
