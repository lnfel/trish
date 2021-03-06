<?php

namespace App\View\Components\Service;

use Illuminate\View\Component;
use App\Service;

class Index extends Component
{
    public $model;
    public $headings;
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model, $headings, $title)
    {
        //
        $this->model = $model;
        $this->headings = $headings;
        $this->title = $title;
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
