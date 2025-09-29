<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    public function test_clients_index_page_works(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get("/clients");
        $response->assertStatus(200);
        $response->assertSee("Clients");
    }
}

