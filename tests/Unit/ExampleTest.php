<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampletTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function example()
    {
        $this->assertTrue(true);
    }
}