<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {

    	$client = new Client(['base_uri' => config('services.passport.base_uri'),]);

    	//config('services.passport.login_endpoint')
    	//config('services.passport.client_id')
    	//config('services.passport.client_secret')
			try {
				$response = $client->post(config('services.passport.login_endpoint'), [
					'form_params' => [
						'grant_type' => 'password',
						'client_id' => config('services.passport.client_id'),
						'client_secret' => config('services.passport.client_secret'),
						'username' => $request->username,
						'password' => $request->password,
					]
				]);

				return $response->getBody();

			} catch (BadResponseException $exception) {
				if ($exception->getCode() == 400) {
					return response()->json('Invalid request. Please enter a username and a password', $exception->getCode());
				} else if ($exception->getCode() == 401) {
					return response()->json('Your credentials are incorrect. Please try again', $exception->getCode());
				}

				return response()->json('Something went wrong on the server', $exception->getCode());
			}
    }

    public function register(Request $request)
    {
    	$request->validate([
    		'name' => ['required', 'string', 'max:255'],
    		'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    		'password' => ['required', 'string', 'min:8'],
    	]);

    	return User::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => Hash::make($request->password),
    	]);
    }

    public function logout(Request $request)
    {
    	auth()->user()->tokens()->each(function($token, $key) {
    		$token->delete();
    	});

    	return response()->json('Logged out successfully.', 200);
    }
}
