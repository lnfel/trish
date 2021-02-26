<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Slot;
use Illuminate\Http\Request;
use App\Http\Resources\Slot as SlotResource;
use Illuminate\Support\Collection;
use Illuminate\Http\Response;
use DateTime;

class SlotApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slotId = 5;
        //$slots = Slot::where('id', $slotId)->get();
        $slots = Slot::all();

        if ($slots) {
            return SlotResource::collection($slots);
        }

        return response()->json('Slot not found.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slot = new Slot();

        $time = new DateTime($request->time);

        //$slot->date = date_format($request->date, 'Y-m-d');
        $slot->date = $request->date;
        $slot->time = date_format($time, 'h:i A');
        //$slot->time = $request->time;
        $slot->slots_left = $request->slots_left ?? 10;

        if ($slot->save()) {
            return new SlotResource($slot);
        }

        return response()->json('Slot not created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function show(Slot $slot)
    {
        if ($slot) {
            return new SlotResource($slot);
        }

        return response()->json('Slot not found.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slot = $this->_slot($id);
        $time = new DateTime($request->time);

        if ($slot) {
            $slot->date = $request->date ?? $slot->date;
            $slot->time = date_format($time, 'h:i A') ?? $slot->time;
            $slot->slots_left = $request->slots_left ?? $slot->slots_left - 1;
            $slot->save();
            return new SlotResource($slot);
        }

        return response()->json('Slot not found.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slot = $this->_slot($id);

        if ($slot) {
            $slot->delete();
            return new SlotResource($slot);
        }

        return response()->json('Slot not found.');
    }

    public function allSlotDates()
    {
        $slots = Slot::groupBy('date')->get()->all();

        if ($slots) {
            return SlotResource::collection($slots);
        }

        return response()->json('No slot with matching date found.');
    }

    public function allSlotDateTimes($date)
    {
        $slots = Slot::where('date', $date)->get();

        if ($slots) {
            return SlotResource::collection($slots);
        }

        return response()->json('No slot with matching date found.');
    }

    protected function _userId()
    {
        return auth('api')->user()->id;
    }

    protected function _slotId()
    {
        return 11;
    }

    protected function _slot($id)
    {
        //$slotId = $this->_userId();
        $slot = Slot::where('id', $id)->first();
        return $slot;
    }
}
