<?php

namespace App\Http\Livewire;

use App\Models\SiteSettings;
use Livewire\Component;

class Settings extends Component
{
    public $siteInfo;
    public $settingField = "";
    public $settingValue = "";

    public $showModal = false;

    public function setField($field)
    {
        if ($this->valuesSet()) {
            $this->showModal = true;

        } else {

            $this->settingField = $field;
        }

    }

    public function valuesSet(): bool
    {
        return ($this->settingField != "") && ($this->settingValue != "");
    }

    public function checkValues()
    {

        $this->showModal = $this->valuesSet();

    }

    public function close()
    {
        $this->settingValue = "";
        $this->settingField = "";

        $this->showModal = false;

    }

    public function mount()
    {
        $this->siteInfo = SiteSettings::first();
    }

    public function render()
    {
        return view('livewire.settings');
    }
}