<?php

namespace App\Http\Controllers;

use App\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DateTime;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SlotController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin')->except('availableTimeSlots');
        $this->middleware('auth:web')->only('availableTimeSlots');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Slot::get()->toJson();
        $headings = collect([
            ['key' => 'id', 'value' => 'ID'],
            ['key' => 'date', 'value' => 'Date'],
            ['key' => 'time', 'value' => 'Time'],
            ['key' => 'slotsLeft', 'value' => 'Slots left'],
            ['key' => 'action', 'value' => 'Action']
        ])->toJson();
        $slots = Slot::all();
        return view('slot.index', ['model' => $model, 'headings' => $headings, 'slots' => $slots]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $columns = collect([
            ['key' => 'date', 'value' => 'Date', 'type' => 'date', 'first' => 'autofocus'],
            ['key' => 'time', 'value' => 'Time', 'type' => 'time'],
            ['key' => 'slots_left', 'value' => 'Slots left', 'type' => 'number']
        ]);
        return view('slot.create', ['columns' => $columns]);
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
                'date' => 'required|date',
                'hour' => 'nullable|string',
                'minute' => 'nullable|string',
                'meridiem' => 'nullable|string',
                'slots_left' => 'nullable|numeric'
            ],
            [
                'date.unique' => 'Date slot already exists.'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->only('date', 'hour', 'minute', 'meridiem', 'slots_left'))->withErrors($validator);
        }

        // create slot
        $time = new DateTime($request->hour.':'.$request->minute.' '.$request->meridiem);

        $slot = Slot::create([
            'date' => $request->date,
            'time' => date_format($time, "h:i A"),
            'slots_left' => $request->slots_left ?? 10
        ]);

        return redirect()->route('slots.create')->with('status', 'Slot created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function show(Slot $slot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function edit(Slot $slot)
    {
        $columns = collect([
            ['key' => 'date', 'value' => 'Date', 'type' => 'date', 'first' => 'autofocus'],
            ['key' => 'time', 'value' => 'Time', 'type' => 'time'],
            ['key' => 'slots_left', 'value' => 'Slots left', 'type' => 'number']
        ]);
        return view('slot.edit', ['model' => $slot, 'columns' => $columns]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slot $slot)
    {
        $time = new DateTime($request->hour.':'.$request->minute.' '.$request->meridiem);
        $data = [
            'date' => $request->date,
            'time' => date_format($time, "h:i A"),
            'slots_left' => $request->slots_left
        ];

        try {
            Slot::findOrFail($slot->id)->update($data);
            return redirect()->route('slots.edit', $slot->id)->with('status', 'Slot edited successfully!');
        }
        catch(ModelNotFoundException $err) {
            // this won't even run unless app is being attacked via injection
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slot $slot)
    {
        Slot::findOrFail($slot->id)->delete();
        return redirect()->route('slots.index')->with('status', 'Slot has been deleted!');
    }

    public function availableTimeSlots(Request $request)
    {
        //$timeSlots = DB::table('slots')->select('time')->whereDate('date', '=', $request)->orderBy('time', 'asc')->get()->toJson();
        //$timeSlots = Slot::where('date', $request->date)->pluck('time')->all();
        $timeSlots = Slot::where('date', $request->date)->get()->pluck('time')->toJson();
        return response()->$timeSlots;
    }

}
