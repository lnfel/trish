<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
		public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	//$model = User::get()->load('address')->toJson();
    	$model = User::with(['address', 'address.city', 'address.region', 'address.province', 'address.brgy'])->get()->toJson();
    	$headings = collect([
          ['key' => 'id', 'value' => 'ID'],
          ['key' => 'avatar', 'value' => 'Avatar'],
          ['key' => 'fullname', 'value' => 'Fullname'],
          ['key' => 'email', 'value' => 'Email'],
          ['key' => 'address', 'value' => 'Address'],
          ['key' => 'valid_id', 'value' => 'Valid ID'],
          ['key' => 'action', 'value' => 'Action']
      ])->toJson();

    	//dd($model);
    	return view('admin.user-index', ['model' => $model, 'headings' => $headings]);
    }

    public function edit(User $user)
    {
    	$columns = collect([
          ['key' => 'fullname', 'value' => 'Fullname', 'type' => 'uneditable-text'],
          ['key' => 'email', 'value' => 'Email', 'type' => 'email'],
          ['key' => 'address', 'value' => 'Address', 'type' => 'address'],
          ['key' => 'valid_id', 'value' => 'Valid ID', 'type' => 'valid_id'],
          ['key' => 'verified', 'value' => 'Verified', 'type' => 'verified'],
      ]);
    	return view('admin.user-edit', ['model' => $user->load(['address']), 'columns' => $columns]);
    }

    public function update(Request $request, User $user)
    {
    	//dd($request->all(), $user);
    	/*$validator = Validator::make($request->all(),
        [
          'verfied' => 'boolean',
        ],
        [

        ]
      );

      if ($validator->fails()) {
	      return redirect()->back()->withInput()->withErrors($validator);
	    }*/
	    //dd($request->has('verified'));
	    $user->update($request->except('verified') + ['verified' => $request->has('verified')]);
	    return redirect()->route('users.edit', $user->id)->with('status', 'User verification status changed!');
    }
}
