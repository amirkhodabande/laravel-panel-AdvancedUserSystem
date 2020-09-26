<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ConfirmEmailController extends Controller
{
    public function index()
    {
        $user = User::where('confirm_token', request('token'))->first();

        if ($user) {
            $user->confirm();
            return redirect('/');
        } else {
            return redirect('/');
        }
    }
}
