<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteSettings>
 */
class SiteSettingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'MrSmart Cleaning Services',
            'operation_day_from' => 'Mon',
            'operation_day_to' => 'Sat',
            'operation_time_from' => '8am',
            'operation_time_to' => '6pm',
            'location' => 'Mpeketoni,Lamu',
            'email' => 'info@mrsmartcs.com',
            'phone' => '+254113350588'
        ];
    }
}