<?php

namespace Modules\Order\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Base\Models\Status;
use Modules\Member\Models\Member;
use Modules\Order\Models\Order;
use Modules\User\Models\User;

class OrderController extends Controller {

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        # parent::__construct();
    }

    public function index(Request $request) {
        $members  = Member::getArray(Status::STATUS_ACTIVE);
        $statuses = Order::getStatus();
        $creators = User::query()->pluck('name', 'id')->toArray();
        $data     = Order::filter($request->all())->orderBy("code")->paginate(20);
        $filter   = $request->all();

        return view("Order::index", compact("data", "members", "statuses", "creators", "filter"));
    }
}
