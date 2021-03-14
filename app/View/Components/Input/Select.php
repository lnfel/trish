<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Select extends Component
{
    public $name, $options;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $options = '')
    {
        $this->name = $name;
        $this->options = $options;
        /*$this->options = [
            'Local employment',
            'National ID',
            'Police Clearance',
            'Postal ID',
            'Passport',
            'NBI Clearance',
            'TESDA',
            'PRC Board Exam',
            'PVAO (Senior)',
            'Scholarship',
            'Money transfer',
            'Others: Avon, Personal Collection',
            'For Traveling: Abroad and Local',
            'For Legal: Probation and Bond',
            'Loan Requirement Purposes',
            'Bank Requirement Purposes',
            'Meralco and Manila Water',

            'Single / Sole Proprietorship',
            'Corporation / Incorporation',

            'Renovation / Repair',
            'New Building for Construction'
        ];*/
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input.select');
    }
}
