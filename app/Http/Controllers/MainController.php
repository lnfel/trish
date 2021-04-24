<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Address;
use App\PhilippineRegion;
use App\PhilippineProvince;
use App\PhilippineCity;
use App\PhilippineBaranggay;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MainController extends Controller
{
	public function __construct()
  {
		$this->middleware('auth')->except('index', 'services');
  }

  public function index()
  {
  	return view('index');
  }

  public function services()
  {
  	$services = Service::all();
  	return view('community-services', ['services' => $services]);
  }

  public function userAppointments()
  {
  	return view('user.appointments');
  }

  public function profile()
  {
    $regions = PhilippineRegion::all();
    /*$provinces = PhilippineProvince::all();
    $cities = PhilippineCity::all();
    $brgys = PhilippineBaranggay::all();*/
    $user = User::with(['address'])->find(auth()->user()->id);
    //dd($regions, $user);
    return view('user.profile', ['regions' => $regions, 'user' => $user]);
  }

  public function storeAddress(Request $request)
  {
    $validator = Validator::make($request->all(),
      [
        'street_address' => 'required|string',
        'region_code' => 'required',
        'province_code' => 'required',
        'city_municipality_code' => 'required',
        'baranggay_code' => 'required',
        'zip_code' => 'nullable',
      ],
      [
        'street_address.required' => 'Street address is required, i.e. (street lot and block, building or compound)',
        'region_code.required' => 'Please select a region.',
        'province_code.required' => 'Please select a province.',
        'city_municipality_code.required' => 'Please select a city / municipality.',
        'baranggay_code.required' => 'Please select a baranggay.',
      ]
    );

    if ($validator->fails()) {
      return redirect()->back()->withInput()->withErrors($validator);
    }

    $address = new Address();
    $address->street_address = $request->street_address;
    $address->region_code = $request->region_code;
    $address->province_code = $request->province_code;
    $address->city_municipality_code = $request->city_municipality_code;
    $address->baranggay_code = $request->baranggay_code;
    $address->zip_code = $request->zip_code;
    $address->user_id = auth()->user()->id;
    $address->save();
    //dd($request->all());

    return redirect()->route('client.profile')->with('status', 'Address saved!');
  }

  public function updateAddress(Request $request, Address $address)
  {
    $validator = Validator::make($request->all(),
      [
        'street_address' => 'required|string',
        'region_code' => 'required',
        'province_code' => 'required',
        'city_municipality_code' => 'required',
        'baranggay_code' => 'required',
        'zip_code' => 'nullable|string',
      ],
      [
        'street_address.required' => 'Street address is required, i.e. (street lot and block, building or compound)',
        'region_code.required' => 'Please select a region.',
        'province_code.required' => 'Please select a province.',
        'city_municipality_code.required' => 'Please select a city / municipality.',
        'baranggay_code.required' => 'Please select a baranggay.',
      ]
    );

    if ($validator->fails()) {
      return redirect()->back()->withInput()->withErrors($validator);
    }

    $data = [
      'street_address' => $request->street_address,
      'region_code' => $request->region_code,
      'province_code' => $request->province_code,
      'city_municipality_code' => $request->city_municipality_code,
      'baranggay_code' => $request->baranggay_code,
      'zip_code' => $request->zip_code,
    ];

    //dd($request->all(), $address, $data);

    try {
      Address::findOrFail($address->id)->update($data);
      return redirect()->route('client.profile')->with('status', 'Address changed!');
    }
    catch(ModelNotFoundException $err) {
      // this won't even run unless app is being attacked via injection
    }
  }

  public function updateIdentification(Request $request, User $user)
  {
    $validator = Validator::make($request->all(),
      [
        'valid_id' => 'nullable|file|max:512|mimes:jpeg,jpg,png',
        'avatar' => 'nullable|file|max:512|mimes:jpeg,jpg,png'
      ],
      [
        
      ]
    );

    if ($validator->fails()) {
      return redirect()->back()->withInput()->withErrors($validator);
    }

    $filteredName = explode(' ', strtolower($user->name));
    $formattedName = implode('-', $filteredName);
    $validIdName = $formattedName.'_valid_id.webp';
    $avatarName = $formattedName.'_avatar.webp';

    if (isset($request->valid_id)) {
      $valid_id = $request->valid_id->storeAs('img', $validIdName, 'image');
      $user->valid_id = $validIdName;
    }

    if (isset($request->avatar)) {
      $avatar = $request->avatar->storeAs('img', $avatarName, 'image');
      $user->avatar = $avatarName;
    }

    //dd(count($request->all()), $request->all(), $validIdName);
    $user->save();

    return redirect()->route('client.profile')->with('status', 'Identification updated!');
  }
}
