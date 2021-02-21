<?php

namespace App\View\Components\Service;

use Illuminate\View\Component;

class Edit extends Component
{
    public $columns;
    public $title;
    public $route;
    public $model;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($columns, $title, $route, $model)
    {
        $this->columns = $columns;
        $this->title = $title;
        $this->route = $route;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.service.edit');
    }
}
