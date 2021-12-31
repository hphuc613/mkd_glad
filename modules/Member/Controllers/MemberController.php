<?php

namespace Modules\Member\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Base\Models\Status;
use Modules\Member\Models\Member;
use Modules\Member\Requests\MemberRequest;
use Modules\User\Models\User;
use Modules\Voucher\Models\Voucher;
use Modules\Voucher\Models\VoucherMember;


class MemberController extends Controller
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
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $filter = $request->all();
        $statuses = Status::getStatuses();
        $members = Member::filter($filter)->orderBy('name')->paginate(15);
        return view("Member::backend.index", compact('members', 'filter', 'statuses'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function getCreate()
    {
        $statuses = Status::getStatuses();
        return view('Member::backend.create', compact('statuses'));
    }

    /**
     * @param MemberRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function postCreate(MemberRequest $request)
    {
        $data = $request->all();
        $data['birthday'] = Carbon::parse($data['birthday'])->format('Y-m-d');
        $member = new Member($data);
        $member->save();
        $request->session()->flash('success', trans('Created successfully.'));

        return redirect()->route('get.member.list');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function getUpdate($id)
    {
        $member = Member::query()->find($id);
        $statuses = Status::getStatuses();
        return view('Member::backend.update', compact('member', 'statuses'));
    }

    /**
     * @param MemberRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function postUpdate(MemberRequest $request, $id)
    {
        if ($request->post()) {
            $data = $request->all();
            $member = Member::query()->find($id);
            if (empty($data['password'])) {
                unset($data['password']);
            }
            unset($data['password_re_enter']);
            $data['birthday'] = Carbon::parse($data['birthday'])->format('Y-m-d');
            $member->update($data);
            $request->session()->flash('success', trans('Updated successfully.'));
        }

        return redirect()->route('get.member.list');
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function delete(Request $request, $id)
    {
        $member = Member::query()->find($id);
        $member->delete();
        $request->session()->flash('success', trans('Deleted successfully.'));

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function getVoucher(Request $request, $id)
    {
//        $filter = $request->all();
//        $statuses = Status::getStatuses();
//        $authors = User::query()->orderBy("name")->pluck('name', 'id')->toArray();
//        $data = Voucher::filter($filter)->with(['member_voucher' => function ($query) use ($id) {
//            $query->where('member_id', $id);
//        }])->orderBy("name")->paginate(20);
        $member = Member::query()->find($id);
        $data = VoucherMember::with('voucher')->where('member_id', $id)->paginate(20);
        return view("Member::backend.voucher", compact("data","member"));
    }


    public function deleteVoucher(Request $request, $member_id, $voucher_id)
    {
        VoucherMember::query()->where('member_id', $member_id)->where('voucher_id', $voucher_id)->delete();
        $request->session()->flash('success', 'Deleted Successfully.');

        return redirect()->back();
    }
}
