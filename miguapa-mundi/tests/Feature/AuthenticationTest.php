<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class AuthenticationTest extends TestCase
{

    use DatabaseTransactions;

    public function test_authenticated_user_can_access_country_in_offer()
    {
        $user =  User::first();

        $response = $this->actingAs($user)->get('/country/in-offer');

        $response->assertStatus(200)
                 ->assertSee('/country/in-offer');
    }

    public function test_unauthenticated_user_redirected_to_login()
    {
        $response = $this->get('/country/in-offer');

        $response->assertRedirect('/login');
    }
}
