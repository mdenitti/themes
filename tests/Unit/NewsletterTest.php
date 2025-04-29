<?php

namespace Tests\Unit;

use Tests\TestCase;

class NewsletterTest extends TestCase
{
    /**
     * Test that a post request to /newsleter returns with status 200 and correct message
     */
    public function test_post_returns_with_message(): void
    {
        $response = $this->post('/newsletter');

        $response->assertStatus(200);
        $response->assertSee("Subscribed successfully");
    }
}
