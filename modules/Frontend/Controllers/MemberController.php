<?php

namespace Modules\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Modules\Frontend\Requests\MemberRequest;
use Modules\Member\Models\Member;


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

    public function getProfile()
    {
        if (!$this->auth->check()) {
            return redirect()->back();
        }
        $data = $this->auth->user();
        return view('Frontend::profile', compact('data'));
    }

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
}
