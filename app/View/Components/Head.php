<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Head extends Component
{

    public $titulo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.head');
    }
}
