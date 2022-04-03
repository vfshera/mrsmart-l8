<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class InputField extends Component
{
    public $label = "";
    public $inputType = "text";
    public $model = "";
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $inputType = "text", $model = "")
    {
        $this->label = $label;
        $this->inputType = $inputType;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-field');
    }
}