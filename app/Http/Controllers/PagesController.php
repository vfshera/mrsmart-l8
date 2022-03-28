<?php

namespace App\Http\Controllers;

use App\Models\SiteSettings;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){

        $services = json_decode(json_encode([
            [
                "name" => "Dry Cleaning",
                "icon" => "clean.svg"
            ],
            [
                "name" => "Carpet Cleaning",
                "icon" => "carpet.svg"
            ],
            [
                "name" => "House Cleaning",
                "icon" => "house.svg"
            ],
            [
                "name" => "Car Interior Cleaning",
                "icon" => "car.svg"
            ],
            [
                "name" => "Upholstery Cleaning",
                "icon" => "sofa_with_buttons.svg"
            ]
            ]));


            $siteInfo = SiteSettings::first();

    
        return view('welcome', compact('services','siteInfo'));
    }




    public function dashboard(){
        return view('dashboard');
    }


    public function settings(){
        $siteInfo = SiteSettings::first();

        return view('livewire.settings' ,  compact('siteInfo'));
    }

    public function notFound(){
        return view('notfound');
    }
}