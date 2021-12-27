<?php

namespace Modules\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Frontend\Models\Frontend;
use Modules\Order\Models\OrderDetail;
use Modules\Product\Models\Product;

class HomeController extends Controller {

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
    public function index(Request $request) {
        $popular_products = Product::query();
        $ids              = OrderDetail::query()
                                       ->select('product_id', DB::raw('SUM(quantity)  AS sum_qty'))
                                       ->groupBy('product_id')
                                       ->orderBy('sum_qty', 'desc')
                                       ->limit(8)
                                       ->pluck('product_id')->toArray();

        $popular_products  = $popular_products->whereIn('id', $ids)->get()->take(3);
        $discover_products = Product::query()->get()->take(6);
        return view("Frontend::home", compact('popular_products', 'discover_products'));
    }


    /**
     * @return string
     */
    public function pointReward() {
        return view('Frontend::modal.point')->render();
    }
}
