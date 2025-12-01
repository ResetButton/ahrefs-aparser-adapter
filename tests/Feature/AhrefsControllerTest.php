<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AhrefsControllerTest extends TestCase
{


    public function test_unsuccessful_response_on_unsupported_endpoint(): void
    {
        $response = $this->get('/?from=subscription_info111');
        $response->assertStatus(404);
        $response->assertJsonStructure(['error']);
    }
}
