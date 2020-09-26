<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    public function test_correct_response_after_user_logs_in()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'password'
        ])->assertStatus(204);
    }

    public function test_correct_response_after_user_trys_to_see_panel()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $this->getJson('/admin/dashbord', [])->assertRedirect('/');
    }
}
