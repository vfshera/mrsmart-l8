<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    use HasFactory;


    public function operationHours(){

        return ($this->operation_day_from ?? "Mon") . " - ".  ($this->operation_day_to ?? "Sat") .  " : " .  ($this->operation_time_from ?? "8am"). " - " . ($this->operation_time_to ?? "6pm");
    }
}