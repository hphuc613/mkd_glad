<?php

namespace Modules\Participate\Controllers;

use App\AppHelpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Participate\Models\Participate;
use Modules\Participate\Requests\ParticipateRequest;
use Modules\User\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ParticipateController extends Controller
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

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $filter = $request->all();
        $authors = User::query()->orderBy("name")->pluck('name', 'id')->toArray();
        $data = Participate::filter($filter)->orderBy("created_at", "DESC")->paginate(20);

        return view("Participate::index", compact("data", "filter", 'authors'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|string
     */

    public function getCreate(Request $request)
    {
        if (!$request->ajax()) {
            return redirect()->back();
        }

        return view("Participate::form")->render();
    }

    /**
     * @param ParticipateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function postCreate(ParticipateRequest $request)
    {
        $data = $request->all();
        Participate::query()->create($data);
        $request->session()->flash('success', trans('Created successfully.'));

        return redirect()->back();
    }

    public function getUpdate(Request $request, $id)
    {

        $data = Participate::query()->find($id);
        if (!$request->ajax()) {
            return redirect()->back();
        }

        return view("Participate::form", compact("data"))->render();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function postUpdate(Request $request, $id)
    {
        $data = $request->all();
        Participate::query()->find($id)->update($data);

        $request->session()->flash('success', 'Updated Successfully.');
        return redirect()->back();
    }

    public function delete(Request $request, $id) {
        Participate::query()->find($id)->delete();
        $request->session()->flash('success', 'Deleted Successfully.');

        return redirect()->back();
    }
}
