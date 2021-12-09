<?php

namespace Modules\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Modules\Frontend\Models\Frontend;
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
        $popular_products = Product::query()->get()->take(3);
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
