<?php

namespace App\View\Components\Service;

use Illuminate\View\Component;
use App\Service;

class Index extends Component
{
    public $services;
    public $headings;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($services, $headings)
    {
        //
        $this->services = $services;
        $this->headings = $headings;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.service.index');
    }
}
