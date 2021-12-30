<?php

namespace Modules\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Member\Models\Member;
use Modules\Voucher\Models\VoucherMember;


class VoucherController extends Controller
{

    public function registerEmail(Request $request)
    {

        $data = $request->all();
        $member = Member::query()->where('email', $data['email'])->first();

        if ($member) {
            VoucherMember::query()->create(['member_id' => $member->id]);
            $request->session()->flash('success', trans('Registration successfully'));
            return redirect()->back();
        }
        $request->session()->flash('danger', trans('This email is not registered'));
        return redirect()->back();
    }
}
