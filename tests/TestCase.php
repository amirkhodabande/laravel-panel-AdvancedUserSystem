<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function loginAdmin()
    {
        $user = factory(User::class)->create(['user_type' => 'admin']);
        $this->actingAs($user);
    }
}
