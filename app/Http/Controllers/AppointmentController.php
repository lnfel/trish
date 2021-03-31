<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Slot;
use App\Service;
use App\User;
use App\Purpose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use PDF;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;

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
        $model = Appointment::where('user_id', auth()->user()->id)->with(['slot', 'service', 'user', 'purpose', 'purpose.requirements', 'purpose.service'])->get()->toJson();
        $headings = collect([
            ['key' => 'id', 'value' => 'ID'],
            ['key' => 'service', 'value' => 'Service'],
            ['key' => 'purpose', 'value' => 'Purpose'],
            ['key' => 'requirements', 'value' => 'Requirements'],
            ['key' => 'slotDate', 'value' => 'Date'],
            ['key' => 'slotTime', 'value' => 'Time'],
            ['key' => 'status', 'value' => 'Status'],
            ['key' => 'action', 'value' => 'Action']
        ])->toJson();
        return view('appointment.index', ['model' => $model, 'headings' => $headings]);
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
        $slots = Slot::where('date', '>=', Carbon::today()->toDateString())->where('slots_left', '>', 0)->groupBy('date')->orderBy('date', 'asc')->get();
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
        // validate form data
        $validator = Validator::make($request->all(),
            [
                'date' => 'required',
                'time' => 'required',
                'service' => 'required',
                'user_id' => 'required',
                'purpose_id' => 'required',
            ],
            [
                'purpose_id.required' => 'The purpose of document request is required.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->only('date', 'time', 'service'))->withErrors($validator);
        }

        $service = Service::find($request->service);
        $serviceName = $service->name;
        $user = User::find($request->user_id);
        $slot = Slot::where(['date' => $request->date], ['time' => $request->time])->first();
        $appointment = new Appointment();
        $appointment->service_id = $service->id;
        $appointment->slot_id = $slot->id;
        $appointment->user_id = $user->id;
        $appointment->purpose_id = $request->purpose_id;
        $pending = Appointment::where(['service_id' => $service->id, 'user_id' => $user->id, 'status' => 'Pending'])->first();
        if ($pending) {
            return redirect()->route('appointments.create', $appointment->service->id)->with('error', 'Appointment exists with '.$serviceName.' on '.Carbon::parse($pending->slot->date)->format('D M d, Y'));
        } else if (!$pending) {
            if ($slot->slots_left > 0) {
                if ($appointment->save()) {
                    $remaining_slot = $slot->slots_left - 1;
                    $slot->slots_left = $remaining_slot;
                    $slot->save();
                    //dd([$slot, $appointment]);
                    return redirect()->route('appointments.index')->with('status', 'Appointment requested successfully!');
                }
            }
        }

        /*
        $pending = $user->appointments->where('status', 'Pending');
        $pending->each(function ($appointment, $index) use($serviceName, $slot) {
            if ($appointment->service->name == $serviceName) {
                //dd($appointment->service->name, $serviceName);
                // User still had pending appointment with this service
                return redirect()->route('appointments.create', $appointment->service->id)->with('error', 'You still have pending appointment with '.$serviceName);
            }
        });
        /**/
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
        return view('appointment.edit', ['appointment' => $appointment]);
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
        //dd($request->all(), $appointment->slot->slots_left + 1, $appointment->slot);
        $data = [
            'status' => $request->status,
        ];

        try {
            if ($request->status === 'Cancel') {
                $appointment->slot->update(['slots_left' => $appointment->slot->slots_left + 1,]);
            }
            
            Appointment::findOrFail($appointment->id)->update($data);
            return redirect()->route('appointments.edit', $appointment->id)->with('status', 'Appointment updated successfully!');
        }
        catch(ModelNotFoundException $err) {
            // this won't even run unless app is being attacked via injection
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        Appointment::findOrFail($appointment->id)->delete();
        return redirect()->route('appointments.index')->with('status', 'Appointment has been deleted!');
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

    public function renew()
    {
        /*$brgyClearance = Service::where('name', 'Baranggay Clearance')->first();*/
        $services = Service::all()->pluck('name');
        //dd($services);
        //extract($services, EXTR_PREFIX_ALL, 'service_');
        
        // merge all query result into one large array
        foreach ($services as $key => $value) {
            ${'service_'.$key} = Appointment::whereHas('service', function(Builder $query) use ($value) {
                $query->where('name', $value);
            })->where(['user_id' => auth()->user()->id, 'status' => 'Complete'])->orderBy('updated_at', 'desc')->with(['service', 'user'])->first();
            //dd(${'service_'.$key});
            $collection = collect(${'service_'.$key});
            //if ($key > 0) {
                $merged = $collection->merge(${'service_'.$key});
            //}
            $result[] = $merged->all();
        }

        // remove empty arrays
        foreach ($result as $key => $value) {
            if (empty($value)) {
                unset($result[$key]);
            }
        }
        //dd($result);
        
        /*$brgyClearance = Appointment::whereHas('service', function(Builder $query) {
            $query->where('name', 'Baranggay Clearance');
        })->where(['user_id' => 1, 'status' => 'Complete'])->orderBy('updated_at', 'desc')->first();

        $busiClearance = Appointment::whereHas('service', function(Builder $query) {
            $query->where('name', 'Business Clearance');
        })->where(['user_id' => 1, 'status' => 'Complete'])->orderBy('updated_at', 'desc')->first();

        $bldgClearance = Appointment::whereHas('service', function(Builder $query) {
            $query->where('name', 'Building Clearance');
        })->where(['user_id' => 1, 'status' => 'Complete'])->orderBy('updated_at', 'desc')->first();*/

        //dd($brgyClearance, $busiClearance, $bldgClearance);

        return view('appointment.renew', ['appointments' => $result]);
    }

    public function renewCreate($appointment_id = null)
    {
        $appointment = Appointment::findOrFail($appointment_id);
        if ($appointment->status == 'Complete') {
            $service = Service::findOrFail($appointment->service->id);
        } else {
            abort(404);
        }

        //dd($appointment, $service);
        return view('appointment.renew-create', ['service' => $service, 'appointment' => $appointment]);
    }

    public function renewDownload(Request $request)
    {
        // validate form data
        $validator = Validator::make($request->all(),
            [
                'purpose_id' => 'required',
            ],
            [
                'purpose_id.required' => 'The purpose of document request is required.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->only('purpose_id'))->withErrors($validator);
        }

        //dd($request->all());
        if ($request->service_id) {
            $service = Service::findOrFail($request->service_id);
        }
        $purpose = Purpose::findOrFail($request->purpose_id);
        $serviceTitle = $service ? $service->name.'.pdf' : 'Angono-document.pdf';
        $user = auth()->user();
        $data = [
            'serviceTitle' => $serviceTitle,
            'service' => $service,
            'user' => $user,
            'purpose' => $purpose,
        ];

        $appointment = Appointment::findOrFail($request->appointment_id);
        $appointment->status = 'Renewing';
        $appointment->save();
        $appointment->status = 'Complete';
        $appointment->save();

        // share data to view
        $pdf = PDF::loadView('pdf.renew', $data);
        
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
                    'username' => 'bk2o1.syndicates@gmail.com',
                    'password' => 'password',
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
        $service = Service::find($service_id)->load('purposes');
        return $service;
    }

}
