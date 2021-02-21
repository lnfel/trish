<?php

namespace App\View\Components\Service;

use Illuminate\View\Component;

class Create extends Component
{
    public $columns;
    public $title;
    public $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($columns, $title, $route)
    {
        $this->columns = $columns;
        $this->title = $title;
        $this->route = $route;
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
