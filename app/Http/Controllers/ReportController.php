<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Service;
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
        return view('report.index', ['data' => collect([])->toJson(), 'reports' => null]);
    }

    public function generate(Request $request)
    {
        // validate form data
        $validator = Validator::make($request->all(),
            [
                'report' => 'required|in:appointments,services',
            ],
            [
                'report.required' => 'Please select a report to generate.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->only('report'))->withErrors($validator);
        }

        if ($request['report'] == 'appointments') {
            $data = ['report' => $request['report'], 'from' => $request['from'], 'to' => $request['from']];
        } else {
            $data = ['report' => $request['report']];
        }

        return redirect()->route('reports.display', $data)->withInput();
    }

    public function displayReport($selectedReport, Request $request)
    {
        $reports = collect([
            ['name' => 'appointments'],
            ['name' => 'services'],
        ]);

        if ($selectedReport == 'appointments') {
            $data = Appointment::get()->load(['user', 'service', 'slot'])->toJson();
        } else {
            $data = Service::all()->toJson();
        }

        dd($selectedReport, $data, $reports, $request->fullUrl(), request()->query('from'), request()->query('to'));
        //session()->put('_old_input.report', $selectedReport);
        session()->flash('report', $selectedReport);
        //old('report', $selectedReport);
        return view('report.index', ['data' => $data, 'reports' => $reports]);
        //return redirect()->route('reports.index', ['data' => $data, 'reports' => $reports]);
    }
}
