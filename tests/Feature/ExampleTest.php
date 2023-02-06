<?php

namespace Tests\Feature;

use App\Models\Matche;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    
    public function test_get_matches_from_api()
    {
        $response = Matche::updateMatches();

        $counts = count($response);

        $this->assertNotEmpty($response, "Se recibieron " . $counts . " datos exitosamente de la api");
    }
}
