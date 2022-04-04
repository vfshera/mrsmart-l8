<?php

namespace App\Http\Livewire;

use App\Models\SiteSettings;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use LSCache;

class Settings extends Component
{
    public $siteInfo;
    public $settingField = "";
    public $settingValue = "";
    public $error;

    public $showModal = false;

    protected $rules = [
        'name' => 'required|min:5',
        'operation_day_from' => 'required|min:3|max:3',
        'operation_day_to' => 'required|min:3|max:3',
        'operation_time_from' => 'required|min:3|max:3',
        'operation_time_to' => 'required|min:3|max:3',
        'location' => 'required|min:5',
        'email' => 'required|email',
        'phone' => 'required|min:12',
    ];

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

    public function save()
    {

        $updateData = [$this->settingField => $this->settingValue];

        $settingRule = [$this->settingField => $this->rules[$this->settingField]];

        $validator = Validator::make($updateData, $settingRule);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $this->error = $errors->first($this->settingField);

            $this->close();

            session()->flash('error', $this->error);

            return redirect()->route('site-settings');
        }

        $validData = $validator->validated();

        $this->siteInfo->update($validData);

        LSCache::purgeAll();

        session()->flash('success', "Settings updated!");

        return redirect()->route('site-settings');
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