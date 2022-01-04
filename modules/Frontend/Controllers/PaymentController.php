<?php

namespace Modules\Frontend\Controllers;

use App\AppHelpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Base\Models\Status;
use Modules\Documentation\Model\Documentation;
use Modules\Frontend\Requests\Payment\PaymentInfoRequest;
use Modules\Order\Models\Order;
use Modules\Order\Models\OrderDetail;
use Modules\Shipping\Models\Shipping;
use Throwable;

class PaymentController extends Controller {

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        # parent::__construct();
        $this->auth = Auth::guard('web');
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
    public function getPaymentShipping(PaymentInfoRequest $request) {
        $cart = [];
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
        }

        $shipping_list = Shipping::query()->where('status', Status::STATUS_ACTIVE)->get();

        $data = $request->all();

        return view('Frontend::payment.payment_shipping', compact('cart', 'data', 'shipping_list'));
    }

    public function getPaymentNow(Request $request) {
        $cart = [];
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
        }

        $data     = json_decode($request->data, 1);
        $shipping = Shipping::query()->where('key_slug', $request->shipping)->first();
        if (empty($shipping)) {
            $request->session()->flash('danger', trans("Cannot find this shipping type."));

            return redirect()->back();
        }

        $data['shipping'] = $shipping->key_slug;


        return view('Frontend::payment.payment_now', compact('cart', 'data', 'shipping'));
    }

    public function postPayment(Request $request) {
        $cart = [];
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
        }

        $data = json_decode($request->data, 1);

        $shipping = Shipping::query()->where('key_slug', $request->shipping)->first();
        if (empty($shipping)) {
            $request->session()->flash('danger', trans("Cannot find this shipping type."));

            return redirect()->back();
        }

        $data['address'] = $data['address'] . ', ' . $data['apartment'] . ', ' . $data['district'] . ', ' . $data['region'] . ' ' . $data['country'];

        DB::beginTransaction();
        try {
            $order                    = new Order();
            $order->code              = Str::random(8);
            $order->member_id         = $this->auth->id() ?? NULL;
            $order->member_name       = $data['name'];
            $order->member_last_name  = $data['last_name'];
            $order->address           = $data['address'];
            $order->email             = $data['email'];
            $order->phone             = $data['phone'];
            $order->shipping_id       = $shipping->id;
            $order->shipping_name     = $shipping->name;
            $order->shipping_price    = $shipping->value;
            $order->total_price       = $cart['amount'];
            $order->amount            = $cart['amount'] + $shipping->value;
            $order->payment_method_id = 1;

            $order->save();

            $order_detail_data = [];
            foreach ($cart['items'] as $key => $item) {
                $product                                  = $item['product'];
                $order_detail_data[$key]['product_id']    = $product->id;
                $order_detail_data[$key]['product_name']  = $product->name;
                $order_detail_data[$key]['product_price'] = $item['price'];
                $order_detail_data[$key]['price']         = $item['price'];
                $order_detail_data[$key]['quantity']      = $item['quantity'];
                $order_detail_data[$key]['capacity']      = $item['capacity'] ?? NULL;
                $order_detail_data[$key]['amount']        = $item['final_price'];
                $order_detail_data[$key]['order_id']      = $order->id;
            }

            OrderDetail::query()->insert($order_detail_data);
            $request->session()->put('cart', []);
            $request->session()->flash('success', 'Created Successfully');
            DB::commit();
        } catch (Throwable $th) {

            $request->session()->flash('danger', 'Create Failed');
            DB::rollBack();
        }

        return redirect()->route('get.home.index');
    }


}
