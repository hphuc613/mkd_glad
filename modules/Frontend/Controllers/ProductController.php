<?php

namespace Modules\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Frontend\Models\Product;

class ProductController extends Controller
{

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        # parent::__construct();
        $this->auth = Auth::guard('web');
    }

    public function productDetail(Request $request, $id)
    {
        $data = Product::query()->find($id);

        if (!empty($data)) {
            $product_recentlies = [];
            if ($request->session()->exists('product_recently')) {
                $product_recently = $request->session()->get('product_recently');
                $product_recentlies = Product::getProductRecently($data->id, $product_recently);
                if (!in_array($data->id, $product_recently)) {
                    $product_recently[] = $data->id;
                    $request->session()->put('product_recently', $product_recently);
                }
            } else {
                $request->session()->put('product_recently', [$data->id]);
            }

            $capacities = json_decode($data->capacity, 1 ?? []);
            $product_relate = Product::query()->where('cate_id', $data->cate_id)->where('id', '<>', $data->id)->limit(4)->get();
            $feedback = $data->feedback;
            return view("Frontend::product.product_detail", compact('data', 'capacities', 'product_relate', 'feedback', 'product_recentlies'));
        }
        return redirect()->back();
    }
}
