<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Select extends Component
{

    public $label;
    public $for;
    public $name;


    /**
     * Select constructor.
     * @param $label
     * @param $for
     * @param $name
     */
    public function __construct($label, $for, $name)
    {
        $this->label = $label;
        $this->for = $for;
        $this->name = $name;
    }


    /**
     * Create a new component instance.
     *
     * @return void
     */


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.select');
    }
}
