<?php

namespace App\Http\Controllers;

use App\Requirement;
use App\Purpose;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RequirementController extends Controller
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
        $model = Requirement::get()->load('purposes', 'purposes.service')->toJson();
        $headings = collect([
            ['key' => 'id', 'value' => 'ID'],
            ['key' => 'name', 'value' => 'Name'],
            ['key' => 'purposes', 'value' => 'Purposes'],
            /*['key' => 'prerequisite', 'value' => 'Prerequisite'],*/
            /*['key' => 'services', 'value' => 'Services'],*/
            ['key' => 'action', 'value' => 'Action']
        ])->toJson();
        $requirements = Requirement::all();
        return view('requirement.index', ['model' => $model, 'headings' => $headings, 'requirements' => $requirements]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $columns = collect([
            ['key' => 'name', 'value' => 'Requirement', 'type' => 'text', 'first' => 'autofocus'],
            ['key' => 'description', 'value' => 'Prerequisites', 'type' => 'textarea'],
            /*['key' => 'prerequisite', 'value' => 'Prerequisites', 'type' => 'text'],*/
            /*['key' => 'service_id', 'value' => 'Service', 'type' => 'multiselect'],*/
        ]);
        $services = Service::all();
        return view('requirement.create', ['columns' => $columns, 'services' => $services]);
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
                'name' => 'required|string|unique:requirements',
                'description' => 'nullable|string',
                'prerequisite' => 'nullable|string'
            ],
            [
                'name.unique' => 'The requirement you are trying to create already exists.'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->only('name', 'description', 'prerequisite'))->withErrors($validator);
        }

        // separate service ids from string and format into new array
        $serviceIds = explode(',', $request->services);

        $requirement = new Requirement();
        $requirement->name = $request->name;
        $requirement->description = $request->description;
        $requirement->prerequisite = $request->prerequisite;
        $requirement->save();

        /*foreach ($serviceIds as $key => $serviceId) {
            $requirement->services()->attach($serviceId);
        }*/
        //dd($request, $requirement);
        return redirect()->route('requirements.create')->with('status', 'Requirement created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function show(Requirement $requirement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function edit(Requirement $requirement)
    {
        $purposes = Purpose::all();
        $columns = collect([
            ['key' => 'name', 'value' => 'Requirement', 'type' => 'text', 'first' => 'autofocus'],
            ['key' => 'description', 'value' => 'Prerequisites', 'type' => 'textarea'],
            /*['key' => 'prerequisite', 'value' => 'Prerequisites', 'type' => 'text'],*/
        ]);
        return view('requirement.edit', ['model' => $requirement, 'columns' => $columns, 'purposes' => $purposes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requirement $requirement)
    {
        //$purposes = $request
        // validate form data
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'description' => 'nullable|string',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->only('name', 'description'))->withErrors($validator);
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        try {
            Requirement::findOrFail($requirement->id)->update($data);
            $requirement->purposes()->sync($request->purposes);
            return redirect()->route('requirements.edit', $requirement->id)->with('status', 'Requirement edited successfully!');
        }
        catch(ModelNotFoundException $err) {
            // this won't even run unless app is being attacked via injection
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requirement $requirement)
    {
        //$requirement->services()->toggle([1, 2]);
        Requirement::findOrFail($requirement->id)->delete();
        return redirect()->route('requirements.index')->with('status', 'Requirement has been deleted!');
    }
}
