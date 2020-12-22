<?php

namespace App\View\Components\Ui;

use Illuminate\View\Component;

class Modal extends Component
{
    public $type;
    public $label;

    /**
     * Create a new component instance.
     *
     * @param string|null $type
     * @param $label
     */
    public function __construct(string $type = null, $label)
    {
        $this->type = $type ?: 'info';
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.ui.modal');
    }
}
