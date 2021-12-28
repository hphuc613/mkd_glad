<?php

namespace Modules\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Modules\Frontend\Requests\Payment\PaymentInfoRequest;

class PaymentController extends Controller {

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        # parent::__construct();
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function getPaymentInfo(Request $request) {
        $cart = [];
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
        }

        return view('Frontend::payment.payment_info', compact('cart'));
    }

    /**
     * @param PaymentInfoRequest $request
     * @return Factory|View
     */
    public function getPaymentShipping (PaymentInfoRequest $request) {
        $cart = [];
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
        }

        $data = $request->all();

        return view('Frontend::payment.payment_shipping', compact('cart', 'data'));
    }

    public function getPaymentNow(Request $request) {
        $cart = [];
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
        }

        $data = json_decode($request->data, 1);
        $data['shipping'] = $request->shipping;

        dd($data);

        return view('Frontend::payment.payment_now', compact('cart', 'data'));
    }


}
