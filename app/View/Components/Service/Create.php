<?php

namespace App\View\Components\Service;

use Illuminate\View\Component;

class Create extends Component
{
    public $columns;
    public $title;
    public $route;
    public $model;
    public $services;
    public $options;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($columns, $title, $route, $model = null, $services = '', $options = [])
    {
        $this->columns = $columns;
        $this->title = $title;
        $this->route = $route;
        $this->model = $model;
        $this->services = $services;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.service.create');
    }
}
