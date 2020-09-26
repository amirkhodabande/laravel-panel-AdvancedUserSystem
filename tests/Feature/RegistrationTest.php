<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Mail\ConfirmYourEmail;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_has_a_token_after_registration()
    {
        Mail::fake();
        // $this->withoutExceptionHandling();

        $this->post('/register', [
            'name' => 'amir',
            'email' => 'a@a.com',
            'password' => 'password',
        ])->assertRedirect();

        $user = User::find(1);
        $this->assertNotNull($user->name);
        $this->assertFalse($user->isConfirmed());
    }

    public function test_an_email_is_sent_to_newly_registered_users()
    {
        $this->withoutExceptionHandling();
        Mail::fake();
        // register new user
        $this->post('/register', [
            'name' => 'amir',
            'email' => 'a@a.com',
            'password' => 'password',
        ])->assertRedirect();
        //assert that a particular email was sent
        Mail::assertQueued(ConfirmYourEmail::class);
    }
}
