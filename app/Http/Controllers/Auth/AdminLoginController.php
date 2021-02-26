<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout', 'adminLogout');
    }

    public function showLoginForm()
    {
    	return view('auth.admin-login');
    }

    public function login(Request $request)
    {
    	// validate form data
        $validator = Validator::make($request->all(),
            [
                'email' => 'required|string|email|exists:App\Admin,email',
                'password' => 'required|string|min:8'
            ],
            [
                'email.exists' => 'The email you entered is not registered.'
            ]
        );

    	// attempt to login as admin
    	if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
    		// if successful then redirect to intended route or admin dashboard
    		return redirect()->intended(route('admin.dashboard'));
    	}

    	// if unsuccessful then redirect back to login page with email and remember fields
    	return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors($validator);
    }

    public function adminLogout(Request $request)
    {
    	Auth::guard('admin')->logout();
    	//$request->session()->flush();
        //$request->session()->regenerate();
    	return redirect('/admin/login');
    }
}
