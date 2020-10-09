<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function giverole(Request $request, $name, User $user)
    {
        // dd($name);
        if (auth()->user()->can('edit-user')) {
            if ($name !== "nothing") {
                $user->removeRole($name);
            }
            // dd($request->name);
            $user->assignRole($request->name);
            return redirect()->back();
        } else {
            $t = 'f';
            $m = 'مهدودیت سطح دسترسی';
            $l = 'users.index';
            return view('admin.alert', compact('t', 'm', 'l'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        if (auth()->user()->can('edit-user')) {
            $user->givePermissionTo($request->name);
        } else {
            $t = 'f';
            $m = 'مهدودیت سطح دسترسی';
            $l = 'users.index';
            return view('admin.alert', compact('t', 'm', 'l'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($permission, User $user)
    {
        // dd(auth()->user());
        if (auth()->user()->can('edit-user')) {
            $user->revokePermissionTo($permission);
        } else {
            $t = 'f';
            $m = 'مهدودیت سطح دسترسی';
            $l = 'users.index';
            return view('admin.alert', compact('t', 'm', 'l'));
        }
    }
}
