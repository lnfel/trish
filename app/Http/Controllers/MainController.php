<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\PhilippineRegion;

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
    //dd($regions);
    return view('user.profile', ['regions' => $regions]);
  }

  public function storeAddress(Request $request)
  {
    dd($request->all());
  }
}
