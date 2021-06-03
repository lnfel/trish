<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $reports = collect([
            ['name' => 'appointments'],
            ['name' => 'services'],
        ]);
        return view('report.index', ['data' => null, 'reports' => $reports]);
    }

    public function generate(Request $request)
    {
        //dd($request->all());

        // validate form data
        $validator = Validator::make($request->all(),
            [
                'report' => 'required|in:appointments,services',
                'service_id' => 'required',
            ],
            [
                'report.required' => 'Please select a report to generate.',
                'service_id.required' => 'Please select a service to attach the purpose with.'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->only('report'))->withErrors($validator);
        }

        //return redirect()->back()->withInput($request->all());
    }
}
