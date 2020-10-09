<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *@param  Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::search($request->all());
        return view('admin/user/index', compact('users'));
    }

    public function edit(User $user)
    {
        if (auth()->user()->can('edit-user')) {
            $role = $user->getRoleNames()->first();
            $all_permissions = Permission::all();
            $user_permissions = $user->getAllPermissions();
            return view('admin.user.edit', compact('user', 'role', 'all_permissions', 'user_permissions'));
        } else {
            $t = 'f';
            $m = 'مهدودیت سطح دسترسی';
            $l = 'users.index';
            return view('admin.alert', compact('t', 'm', 'l'));
        }
    }
}
