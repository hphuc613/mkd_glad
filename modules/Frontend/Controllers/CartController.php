<?php

namespace Modules\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Modules\Base\Models\Status;
use Modules\Frontend\Models\Frontend;
use Modules\Product\Models\Product;
use function Doctrine\Common\Cache\Psr6\get;

class CartController extends Controller {

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
     * @return string
     */
    public function cartBox(Request $request) {
        $cart = [];
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
        }

        $products = Product::query()->where('status', Status::STATUS_ACTIVE)->orderBy('created_at', 'desc')->limit(4)->get();

        return view("Frontend::cart.cart_box", compact('cart', 'products'))->render();
    }


    /**
     * @param Request $request
     * @return array
     */
    public function addToCart(Request $request) {
//        $request->session()->put('cart', []);

        if (isset($request->data)) {
            $data = Product::query()->where('key_slug', $request->data)->first();
            if (!empty($data) && (int)$data->stock_in > 0) {
                $capacity              = json_decode($data->capacity, 1);
                $cart_item['product']  = $data;
                $cart_item['capacity'] = reset($capacity);
                $cart_item['quantity'] = 1;
                $cart_item['price']    = !empty($data->discount) ? $data->discount : $data->price;

                $cart = [];
                if ($request->session()->has('cart')) {
                    $cart = $request->session()->get('cart');
                    if (isset($cart['items'])) {
                        $get_ids = array_keys($cart['items']);
                        if (in_array($data->id, $get_ids)) {
                            $cart_item['quantity'] = $cart['items'][$data->id]['quantity'] + 1;
                            $cart_item['price']    = (!empty($data->discount) ? $data->discount
                                    : $data->price) * $cart_item['quantity'];
                        }
                    }
                }
                $cart['items'][$data->id] = $cart_item;
                $cart['amount']           = array_sum(array_column($cart['items'], 'price'));
                $cart['quantity']         = array_sum(array_column($cart['items'], 'quantity'));
                $request->session()->put('cart', $cart);

                return [
                    'status' => 200
                ];
            }
        }

        return [
            'status'  => 300,
            'message' => trans('The product is sold out')
        ];
    }
}
