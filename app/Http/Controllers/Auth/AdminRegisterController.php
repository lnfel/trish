<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminRegisterController extends Controller
{
    public function showRegisterForm()
    {
    	return view('auth.admin-register');
    }

    public function register(Request $request)
    {
    	// validate form data
        $validator = Validator::make($request->all(),
            [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|string|email|unique:admins',
                'password' => 'required|string|min:8'
            ],
            [
                'email.unique' => 'The email you entered is already registered.'
            ]
        );

    	// create admin
    	try {
    		$admin = Admin::create([
    			'first_name' => $request->first_name,
    			'last_name' => $request->last_name,
    			'email' => $request->email,
    			'password' => Hash::make($request->password),
    		]);

    		// login the account
	    	Auth::guard('admin')->loginUsingId($admin->id);
	    	return redirect()->route('admin.dashboard');
	    } catch(\Exception $e) {
	    	return redirect()->back()->withInput($request->only('first_name', 'last_name', 'email'))->withErrors($validator);
    	}

    }
}
