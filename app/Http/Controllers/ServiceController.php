<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ServiceController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Service::get()->toJson();
        $headings = collect([
            ['key' => 'id', 'value' => 'ID'],
            ['key' => 'name', 'value' => 'Name'],
            ['key' => 'description', 'value' => 'Description'],
            ['key' => 'price', 'value' => 'Price'],
            ['key' => 'action', 'value' => 'Action']
        ])->toJson();
        return view('service.index', ['model' => $model, 'headings' => $headings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $columns = collect([
            ['key' => 'name', 'value' => 'Name', 'type' => 'text', 'first' => 'autofocus'],
            ['key' => 'description', 'value' => 'Description', 'type' => 'textarea'],
            ['key' => 'price', 'value' => 'Price in pesos', 'type' => 'number']
        ]);
        return view('service.create', ['columns' => $columns]);
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
                'name' => 'required|string|unique:services',
                'description' => 'nullable|string',
                'price' => 'nullable|numeric'
            ],
            [
                'name.unique' => 'The service you are trying to create already exists.'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->only('name', 'description', 'price'))->withErrors($validator);
        }

        // create service
        $service = Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return redirect()->route('services.create')->with('status', 'Service created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        $columns = collect([
            ['key' => 'name', 'value' => 'Name', 'type' => 'text', 'first' => 'autofocus'],
            ['key' => 'description', 'value' => 'Description', 'type' => 'textarea'],
            ['key' => 'price', 'value' => 'Price in pesos', 'type' => 'price']
        ]);
        return view('service.edit', ['model' => $service, 'columns' => $columns]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ];

        try {
            Service::findOrFail($service->id)->update($data);
            return redirect()->route('services.edit', $service->id)->with('status', 'Service edited successfully!');
        }
        catch(ModelNotFoundException $err) {
            // this won't even run unless app is being attacked via injection
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
        Service::findOrFail($service->id)->delete();
        return redirect()->route('services.index')->with('status', 'Service has been deleted!');
    }
}
