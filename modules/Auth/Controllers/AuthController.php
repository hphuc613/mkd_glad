<?php

namespace Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    protected $auth;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->auth = Auth::guard('admin');
    }

    /**
     * @param Request $request
     * @return Factory|View|RedirectResponse
     */
    public function getLogin(Request $request) {
        if ($this->auth->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view("Auth::backend.login");
    }

    /**
     * @param Request $request
     * @return Factory|View|RedirectResponse
     */
    public function postLogin(Request $request) {
        $credentials = $request->only('username', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember_me'))) {

            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.get.forgot_password');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function getLogout(Request $request) {
        $this->auth->logout();

        return redirect()->route('admin.get.login');
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function getForgotPassword(Request $request) {

        return view("Auth::backend.forgot_password");
    }
}
