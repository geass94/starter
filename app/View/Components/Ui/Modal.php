<?php

namespace App\View\Components\Ui;

use Illuminate\View\Component;

class Modal extends Component
{
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $type = null)
    {
        $this->type = $type ?: 'info';
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
