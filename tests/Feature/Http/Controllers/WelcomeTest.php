<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class WelcomeTest extends TestCase
{

    /** @test */
    public function can_not_access_welcome_page_without_pink() {
        $response = $this->get(route('root'));
        $response->assertStatus(302);
        $response->assertRedirect(route('pin.create'));
    }

    /** @test */
    public function can_access_welcome_page_with_pin_cookie() {
        $response = $this->withCookie('pin', 'okay')->get(route('root'));
        $response->assertStatus(200);
    }

    /** @test */
    public function can_enter_pin_and_access_root_page() {
        $response = $this->post(route('pin.store', [
            'pin' => env('PIN'),
        ]));
        $response->assertRedirect(route('root'));
    }
}
