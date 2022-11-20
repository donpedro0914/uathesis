<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
            ? $this->username()
            : 'username';

        return [
            $field => $request->get($this->username()),
            'password' => $request->password,
            'status' => 1
        ];
    }

    protected function authenticated() {
        $type = Auth::user()->type;

        if ($type == 'Store Manager') {
            return redirect('/store-manager/portal');
        } elseif($type == 'Admin') {
            return redirect('/dashboard/portal');
        } elseif($type == 'Partner') {
            return redirect('/partner/portal');
        } elseif($type == 'Cashier') {
            return redirect('/pos/portal');
        } else if($type == 'Supervisor') {
            return redirect('/supervisor/portal');
        } else if($type == 'Manager') {
            return redirect('/manager/portal');
        } else {
            return redirect('/login')->with('error', 'Incorrect username or password');
        }
    }
}
