<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class DynamicInput extends Component
{
    public $label;
    public $for;
    public $type;
    public $name;

    public $i = 0;
    public $inputs = array();

    public function mount($label, $for, $type, $name) {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->for = $for;
    }

    public function add($i)
    {
        $i+=1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i) {
        unset($this->inputs[$i]);
    }

    public function render()
    {
        return view('livewire.forms.dynamic-input');
    }
}
