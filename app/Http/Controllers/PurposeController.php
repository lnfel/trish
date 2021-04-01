<?php

namespace App\Http\Controllers;

use App\Purpose;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class PurposeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Purpose::get()->load('service')->toJson();
        $headings = collect([
            ['key' => 'id', 'value' => 'ID'],
            ['key' => 'name', 'value' => 'Name'],
            ['key' => 'service', 'value' => 'Service'],
            ['key' => 'action', 'value' => 'Action']
        ])->toJson();
        return view('purpose.index', ['model' => $model, 'headings' => $headings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $columns = collect([
            ['key' => 'name', 'value' => 'Purpose', 'type' => 'text', 'first' => 'autofocus'],
            ['key' => 'service_id', 'value' => 'Service', 'type' => 'select2'],
            /*['key' => 'prerequisite', 'value' => 'Prerequisites', 'type' => 'text'],*/
            /*['key' => 'service_id', 'value' => 'Service', 'type' => 'multiselect'],*/
        ]);
        $services = Service::all();
        $model = null;
        return view('purpose.create', ['columns' => $columns, 'services' => $services, 'model' => $model]);
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
                'name' => 'required|string',
                'service_id' => 'required',
            ],
            [
                'name.required' => 'Name of the purpose is required',
                'service_id.required' => 'Please select a service to attach the purpose with.'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->only('name'))->withErrors($validator);
        }

        $purpose = new Purpose();
        $purpose->name = $request->name;
        $purpose->service_id = $request->service_id;
        $purpose->save();

        return redirect()->route('purposes.create')->with('status', 'Purpose created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purpose  $purpose
     * @return \Illuminate\Http\Response
     */
    public function show(Purpose $purpose)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purpose  $purpose
     * @return \Illuminate\Http\Response
     */
    public function edit(Purpose $purpose)
    {
        $services = Service::all();
        $columns = collect([
            ['key' => 'name', 'value' => 'Purpose', 'type' => 'text', 'first' => 'autofocus'],
            ['key' => 'service_id', 'value' => 'Service', 'type' => 'select2'],
        ]);
        return view('purpose.edit', ['model' => $purpose->load('service'), 'columns' => $columns, 'services' => $services]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purpose  $purpose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purpose $purpose)
    {
        // validate form data
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'service_id' => 'required',
            ],
            [
                'name.required' => 'Name of the purpose is required',
                'service_id.required' => 'Please select a service to attach the purpose with.'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->only('name'))->withErrors($validator);
        }

        $data = [
            'name' => $request->name,
            'service_id' => $request->service_id,
        ];

        try {
            Purpose::findOrFail($purpose->id)->update($data);
            return redirect()->route('purposes.edit', $purpose->id)->with('status', 'Purpose edited successfully!');
        }
        catch(ModelNotFoundException $err) {
            // this won't even run unless app is being attacked via injection
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purpose  $purpose
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purpose $purpose)
    {
        $purpose->delete();
        return redirect()->route('purposes.index')->with('status', 'Purpose has been deleted!');
    }
}
