<?php

namespace Tests\Unit;

use Tests\TestCase;

class ContactTest extends TestCase
{
    public function test_get_returns_with_text(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('Contacteer ons');
    }
}
