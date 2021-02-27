<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Slot;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use PDF;

class AppointmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($service_id = null)
    {
        $loginStatus = $this->_login();
        $columns = collect([
            ['key' => 'name', 'value' => 'Name', 'type' => 'text', 'first' => 'autofocus'],
            ['key' => 'description', 'value' => 'Description', 'type' => 'textarea'],
            ['key' => 'price', 'value' => 'Price in pesos', 'type' => 'number']
        ]);

        if ($service_id) {
            $service = $this->_service($service_id);
        } else {
            $service = null;
        }

        $services = Service::all();

        //$slots = DB::table('slots')->whereDate('date', '>=', Carbon::today()->toDateString())->orderBy('date', 'asc')->get()->toJson();
        $slots = Slot::where('date', '>=', Carbon::today()->toDateString())->groupBy('date')->orderBy('date', 'asc')->get();
        //dd($slots);
        //$slots = $this->_fetchDates();

        return view('appointment.create', ['columns' => $columns, 'slots' => $slots, 'service' => $service, 'services' => $services]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function availableTimeSlots(Request $request)
    {
        //$timeSlots = DB::table('slots')->select('time')->whereDate('date', '=', $request)->orderBy('time', 'asc')->get()->toJson();
        //$timeSlots = Slot::where('date', $request->date)->pluck('time')->all();
        $timeSlots = Slot::where('date', $request->date)->get()->pluck('time');
        return $timeSlots;
    }

    public function download($service_id = null)
    {
        if ($service_id) {
            $service = Service::find($service_id);
        }
        $serviceTitle = $service ? $service->name.'.pdf' : 'Angono-document.pdf';
        $user = auth()->user();
        $data = [
            'serviceTitle' => $serviceTitle,
            'service' => $service,
            'user' => $user
        ];

        // share data to view
        $pdf = PDF::loadView('pdf.download', $data);
        
        // download PDF file with download method
        return $pdf->download($serviceTitle);
    }

    protected function _login()
    {
        $client = new Client(['base_uri' => config('services.passport.base_uri'),]);

        try {
            $response = $client->post(config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'username' => 'succman@usa.com',
                    'password' => '12345678',
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

    protected function _fetchDates()
    {
        $client = new Client(['base_uri' => config('services.passport.base_uri'),]);

        try {
            $response = $client->get('http://localhost:8000/api/all-slot-dates');

            //https://stackoverflow.com/questions/30530172/guzzle-6-no-more-json-method-for-responses
            //https://stackoverflow.com/questions/47860265/api-call-with-lumen-guzzle-gives-error-array-to-string-conversion
            //dd(json_decode($response->getBody(), true));
            //dd($response->getBody()->getContents());
            //dd(json_decode($response->getBody()->getContents(), true));
            return json_decode($response->getBody(), true);
            
        } catch (BadResponseException $exception) {
            if ($exception->getCode() == 400) {
                return response()->json('Invalid request. Please enter a username and a password', $exception->getCode());
            } else if ($exception->getCode() == 401) {
                return response()->json('Your credentials are incorrect. Please try again', $exception->getCode());
            }

            return response()->json('Something went wrong on the server', $exception->getCode());
        }
    }

    protected function _service($service_id)
    {
        //$service = Service::where('id', $service_id)->first(); // alternative
        $service = Service::find($service_id);
        return $service;
    }

}
