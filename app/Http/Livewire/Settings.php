<?php

namespace App\Http\Livewire;

use App\Models\SiteSettings;
use Livewire\Component;

class Settings extends Component
{
    public $siteInfo;

    public $settingField = "";
    public $settingValue = "";

    public function setField($field)
    {
        //Purging on any settings update

        // LSCache::purgeAll();
        $this->settingField = $field;
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