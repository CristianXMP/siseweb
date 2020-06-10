<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ItemHomework extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $name;
     public $qualification;

    public function __construct($name, $qualification)
    {
        $this->name = $name;
        $this->qualification  = $qualification;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.item-homework');
    }
}
