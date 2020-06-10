<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardStateHomework extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $number;
     public $text;

    public function __construct($number, $text)
    {
        $this->number = $number;
        $this->text   = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card-state-homework');
    }
}
