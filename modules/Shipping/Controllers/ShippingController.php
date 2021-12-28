<?php

namespace Modules\Shipping\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Base\Models\Status;
use Modules\Shipping\Models\Shipping;
use Modules\Shipping\Requests\ShippingRequest;

class ShippingController extends Controller
{

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        # parent::__construct();
    }

    public function index(Request $request)
    {
        $statuses = Status::getStatuses();
        $filter = $request->all();
        $data = Shipping::filter($filter)->orderBy("name")->paginate(20);

        return view("Shipping::index", compact("data", "filter", "statuses"));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function getCreate(Request $request)
    {
        $statuses = Status::getStatuses();
        if (!$request->ajax()) {
            return redirect()->back();
        }

        return view("Shipping::form", compact("statuses"))->render();
    }

    /**
     * @param ShippingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(ShippingRequest $request)
    {
        $data = $request->all();
        Shipping::query()->create($data);
        $request->session()->flash('success', 'Created Successfully.');

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function getUpdate(Request $request, $id)
    {
        $statuses = Status::getStatuses();
        $data = Shipping::query()->find($id);
        if (!$request->ajax()) {
            return redirect()->back();
        }

        return view("Shipping::form", compact("statuses", "data"))->render();
    }

    /**
     * @param ShippingRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpdate(ShippingRequest $request, $id)
    {
        $data = $request->all();
        Shipping::query()->find($id)->update($data);
        $request->session()->flash('success', 'Updated Successfully.');

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request, $id)
    {
        Shipping::query()->find($id)->delete();
        $request->session()->flash('success', 'Deleted Successfully.');

        return redirect()->back();
    }
}
