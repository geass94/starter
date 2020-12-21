<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $label;

    /**
     * Button constructor.
     * @param $type
     * @param $label
     */
    public function __construct($type, $label)
    {
        $this->type = $type;
        $this->label = $label;
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
        return view('components.forms.button');
    }
}
