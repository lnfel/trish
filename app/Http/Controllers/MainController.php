<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

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
    return view('user.profile');
  }
}
