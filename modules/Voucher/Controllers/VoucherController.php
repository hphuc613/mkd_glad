<?php

namespace Modules\Voucher\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Base\Models\Status;
use Modules\User\Models\User;
use Modules\Voucher\Models\Voucher;
use Modules\Voucher\Requests\VoucherRequest;

class VoucherController extends Controller
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
        $filter = $request->all();
        $statuses = Status::getStatuses();
        $authors = User::query()->orderBy("name")->pluck('name', 'id')->toArray();
        $data = Voucher::filter($filter)->orderBy("name")->paginate(20);

        return view("Voucher::index", compact("data", "statuses", "filter", "authors"));
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

        return view("Voucher::form", compact("statuses"))->render();
    }

    /**
     * @param VoucherRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(VoucherRequest $request)
    {
        $data = $request->all();
        $data['expiration_date'] = formatDate(strtotime($request->expiration_date), 'Y-m-d H:i');
        Voucher::query()->create($data);
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
        $data = Voucher::query()->find($id);
        $data->expiration_date = formatDate(strtotime($data->expiration_date), 'd-m-Y H:i');
        if (!$request->ajax()) {
            return redirect()->back();
        }

        return view("Voucher::form", compact("statuses", "data"))->render();
    }

    /**
     * @param VoucherRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpdate(VoucherRequest $request, $id)
    {
        $data = $request->all();
        $data['expiration_date'] = formatDate(strtotime($request->expiration_date), 'Y-m-d H:i');
        Voucher::query()->find($id)->update($data);
        $request->session()->flash('success', 'Updated Successfully.');

        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        Voucher::query()->find($id)->delete();
        $request->session()->flash('success', 'Deleted Successfully.');

        return redirect()->back();
    }
}
