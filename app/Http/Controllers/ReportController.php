<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Service;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('report.index', [
            'data' => collect([])->toJson(),
            'reports' => null,
            'fromDate' => Carbon::now()->toDateString(),
            'toDate' => Carbon::now()->toDateString()
        ]);
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
            $data = ['report' => $request['report'], 'from' => $request['from'], 'to' => $request['to']];
        } else {
            $data = ['report' => $request['report']];
        }

        //dd($data);

        return redirect()->route('reports.display', $data)->withInput();
    }

    public function displayReport($selectedReport, Request $request)
    {
        $reports = collect([
            ['name' => 'appointments'],
            ['name' => 'services'],
        ]);

        $from = Carbon::create(request()->query('from'))->toDateString();
        $to = Carbon::create(request()->query('to'))->toDateString();
        $user = auth()->user();

        if ($selectedReport == 'appointments') {
            //$data = Appointment::get()->load(['user', 'service', 'slot'])->toJson();
            $data = Appointment::with(['user', 'service', 'slot'])->whereHas('slot', function(Builder $query) use($from, $to) {
                return $query->whereBetween('date', [$from, $to]);
            })->get();
            $headers = [
                'Service', 'Client', 'Appointment date', 'Status'
            ];
        } else {
            $data = Service::all();
            $headers = [
                'Name'
            ];
        }

        $pdfData = [
            'model' => $data,
            'user' => $user,
            'headers' => $headers,
            'report' => $selectedReport,
            'from' => $from,
            'to' => $to
        ];

        //dd($pdfData);

        $filename = 'angono-'.$selectedReport.'-report_'.date_format(now(), 'm-d-Y').'.pdf';
        $pdf = PDF::loadView('pdf.report', $pdfData)->save('/reports/'.$filename);
        $reportLink = asset('storage/reports/'.$filename);
        //dd($from, $to, $data);

        //dd($selectedReport, $data, $reports, $request->fullUrl(), request()->query('from'), request()->query('to'));
        //session()->put('_old_input.report', $selectedReport);
        session()->flash('report', $selectedReport);
        session()->flash('status', 'Report has been generated!');
        session()->flash('reportLink', $reportLink);
        //old('report', $selectedReport);
        return view('report.index', ['data' => $data, 'reports' => $reports, 'fromDate' => $from, 'toDate' => $to]);
        //return redirect()->route('reports.index', ['data' => $data, 'reports' => $reports]);
    }

    public function makeFile(Request $request)
    {
        dd($request->fullUrl());
    }
}
