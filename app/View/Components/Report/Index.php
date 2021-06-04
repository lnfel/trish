<?php

namespace App\View\Components\Report;

use Illuminate\View\Component;
use App\Appointment;

class Index extends Component
{
    public $data, $title, $reports;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data, $title, $reports)
    {
        $this->data = $data;
        $this->title = $title;
        $this->reports = collect([
            ['name' => 'appointments'],
            ['name' => 'services'],
        ]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.report.index', ['data' => $this->data, 'title' => $this->title, 'reports' => $this->reports]);
    }
}
