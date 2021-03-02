<?php

namespace App\View\Components\Flash;

use Illuminate\View\Component;

class Alert extends Component
{
    public $status;
    public $bg;
    public $textColor;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($status, $bg = 'bg-green-200', $textColor = 'text-green-800')
    {
        //
        $this->status = $status;
        $this->bg = $bg;
        $this->textColor = $textColor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.flash.alert');
    }
}
