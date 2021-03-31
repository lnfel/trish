<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class MultiSelect extends Component
{
    public $action;
    public $model;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $model = '')
    {
        $this->action = $action;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input.multi-select');
    }
}
