<?php

namespace Modules\Feedback\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Feedback\Models\Feedback;
use Modules\Member\Models\Member;
use Modules\Product\Models\Product;

class FeedbackController extends Controller {

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
        $filter   = $request->all();
        $products = Product::getArray();
        $members  = Member::getArray();
        $data     = Feedback::filter($filter)
                            ->with('member', 'product')
                            ->orderBy("created_at", "desc")
                            ->paginate(20);

        return view("Feedback::index", compact("data", "products", "members", "filter"));
    }

    /**
     * @param Request $request
     * @param $id
     * @return Factory|View|RedirectResponse
     */
    public function detail(Request $request, $id) {
        $data = Feedback::query()->find($id);

        if (!$request->ajax()) {
            return redirect()->back();
        }

        return view('Feedback::detail', compact("data"));
    }
}
