<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Slot;
use App\Service;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminAppointmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$model = Appointment::with(['slot', 'service', 'user'])->get()->toJson();
        $headings = collect([
            ['key' => 'id', 'value' => 'ID'],
            ['key' => 'service', 'value' => 'Service'],
            ['key' => 'slotDate', 'value' => 'Date'],
            ['key' => 'slotTime', 'value' => 'Time'],
            ['key' => 'user', 'value' => 'Client'],
            ['key' => 'status', 'value' => 'Status'],
            ['key' => 'action', 'value' => 'Action']
        ])->toJson();
        return view('admin.appointment-index', ['model' => $model, 'headings' => $headings]);
    }

    public function edit(Appointment $appointment)
    {
    	return view('admin.appointment-edit', ['appointment' => $appointment]);
    }

    public function update(Request $request, Appointment $appointment)
    {
    	$data = [
        'status' => $request->status,
        'paid' => $request->paid
      ];

      try {
        Appointment::findOrFail($appointment->id)->update($data);
        return redirect()->route('client.user.appointments.edit', $appointment->id)->with('status', 'Appointment updated successfully!');
      }
      catch(ModelNotFoundException $err) {
        // this won't even run unless app is being attacked via injection
      }
    }
}
