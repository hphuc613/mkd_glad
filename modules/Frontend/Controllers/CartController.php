<?php

namespace Modules\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Modules\Base\Models\Status;
use Modules\Frontend\Models\Frontend;
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductCapacity;
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

        $products = Product::query()
                           ->where('status', Status::STATUS_ACTIVE)
                           ->orderBy('created_at', 'desc')
                           ->limit(4)
                           ->get();

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
            if ((int)$data->stock_in <= 0) {
                return [
                    'status'  => 300,
                    'message' => trans('The product is sold out')
                ];
            }
            if (!empty($data)) {
                $cart_item['product']  = $data;
                $cart_item['quantity'] = 1;
                $cart_item['price']    = !empty($data->discount) ? $data->discount : $data->price;
                if (isset($request->capacity) && !empty($request->capacity)) {
                    $capacity              = ProductCapacity::query()->find($request->capacity);
                    $cart_item['capacity'] = $capacity->capacity . $capacity->unit;
                    $cart_item['price']    = !empty($capacity->discount) ? $capacity->discount : $capacity->price;

                    if ((int)$capacity->stock_in <= 0) {
                        return [
                            'status'  => 300,
                            'message' => trans('The product is sold out')
                        ];
                    }
                }
                $cart_item['final_price'] = $cart_item['price'];

                $cart = [];
                if ($request->session()->has('cart')) {
                    $cart = $request->session()->get('cart');
                    if (isset($cart['items'])) {
                        $get_ids = array_keys($cart['items']);
                        if (isset($request->capacity)) {
                            $key = $data->id . '-' . $cart_item['capacity'];
                        } else {
                            $key = $data->id;
                        }
                        if (in_array($key, $get_ids)) {
                            $cart_item['quantity']    = $cart['items'][$key]['quantity'] + 1;
                            $cart_item['final_price'] = $cart_item['price'] * $cart_item['quantity'];
                        }
                    }
                }
                if (isset($request->capacity)) {
                    $cart['items'][$data->id . '-' . $cart_item['capacity']] = $cart_item;
                } else {
                    $cart['items'][$data->id] = $cart_item;
                }
                $cart['amount']   = array_sum(array_column($cart['items'], 'final_price'));
                $cart['quantity'] = array_sum(array_column($cart['items'], 'quantity'));
                $request->session()->put('cart', $cart);
            }
        }

        return [
            'status' => 200
        ];
    }
}
