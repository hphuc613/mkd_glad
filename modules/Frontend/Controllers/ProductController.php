<?php

namespace Modules\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Base\Controllers\BaseController;
use Modules\Frontend\Models\Product;

class ProductController extends BaseController {

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
    public function productListing(Request $request) {
        $data               = Product::query()->with('category');
        $product_recentlies = [];
        if ($request->session()->has('product_recently')) {
            $product_recently = $request->session()->get('product_recently');

            $product_recentlies = Product::getProductRecently(null, $product_recently);

        }

        if (isset($request->cate)) {
            $data = $data->whereHas('category', function ($qc) use ($request) {
                return $qc->where('key_slug', $request->cate);
            });
        }

        $data = $data->paginate(12);

        return view('Frontend::product.product_listing', compact('data', 'product_recentlies'));
    }

    /**
     * @param Request $request
     * @param $key_slug
     * @return Factory|View|RedirectResponse
     */
    public function productDetail(Request $request, $key_slug) {
        $data = Product::query()->with(['feedback', 'category'])->where('key_slug', $key_slug)->first();

        if (!empty($data)) {
            $product_recentlies = [];
            if ($request->session()->has('product_recently')) {
                $product_recently   = $request->session()->get('product_recently');
                $product_recentlies = Product::getProductRecently($data->id, $product_recently);
                if (!in_array($data->id, $product_recently)) {
                    $product_recently[] = $data->id;
                    $request->session()->put('product_recently', $product_recently);
                }
            } else {
                $request->session()->put('product_recently', [$data->id]);
            }

            $capacities     = json_decode($data->capacity, 1 ?? []);
            $product_relate = Product::query()
                                     ->where('cate_id', $data->cate_id)
                                     ->where('id', '<>', $data->id)
                                     ->limit(4)
                                     ->get();
            $feedback       = $this->paginate($data->feedback, 1);
            return view("Frontend::product.product_detail", compact('data', 'capacities', 'product_relate', 'feedback', 'product_recentlies'));
        }
        return redirect()->back();
    }
}
