<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class TextArea extends Component
{
    public $label = "";
    public $model = "";
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $model = "")
    {
        $this->label = $label;
        $this->model = $model;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.text-area');
    }
}