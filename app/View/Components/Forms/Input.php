<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    public $label;
    public $for;
    public $type;
    public $name;
    public $value;
    public $placeholder;

    /**
     * Input constructor.
     * @param $label
     * @param $for
     * @param $type
     * @param $name
     * @param $value
     * @param $placeholder
     */
    public function __construct($label = null, $for = null, $type = null, $name = null, $value = null, $placeholder = null)
    {
        $this->label = $label;
        $this->for = $for;
        $this->type = $type;
        $this->name = $name;
        $this->value = $value ?: old($name);
        $this->placeholder = $placeholder;
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
        return view('components.forms.input');
    }
}
