<?php

namespace Modules\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Modules\Frontend\Requests\MemberRequest;
use Modules\Member\Models\Member;
use Modules\Voucher\Models\VoucherMember;


class MemberController extends Controller
{
    protected $auth;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->auth = Auth::guard('web');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function getProfile()
    {
        if (!$this->auth->check()) {
            return redirect()->back();
        }
        $data = $this->auth->user();
        return view('Frontend::member.profile', compact('data'));
    }

    /**
     * @param MemberRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postProfile(MemberRequest $request)
    {
        if ($request->post()) {
            $data = $request->all();
            $member = Member::query()->find($this->auth->id());
            if (empty($data['password'])) {
                unset($data['password']);
            }
            unset($data['password_re_enter']);
            if(empty($data['birthday'])){
                unset($data['birthday']);
            }else{
                $data['birthday'] = Carbon::parse($data['birthday'])->format('Y-m-d');
            }
            $member->update($data);
            $request->session()->flash('success', trans('Updated successfully.'));
        }

        return redirect()->route('get.home.profile');
    }

    public function getVoucher()
    {
        if (!$this->auth->check()) {
            return redirect()->back();
        }
        $data = VoucherMember::with('voucher')->where('member_id', $this->auth->id())->get();
        return view('Frontend::member.voucher', compact('data'));
    }
}
