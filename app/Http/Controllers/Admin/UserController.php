<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

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
        $users = User::search($request->all());;
        return view('admin/user/index', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (auth()->user()->user_type == 'boss') {

            $user->update(['user_type' => $request->user_type]);
            $t = 's';
            $m = "تغییر سطح دسترسی";
            $l = 'users.index';
            return  view('admin.alert', compact('m', 'l', 't'));
        } else {
            $t = 'f';
            $m = "مهدودیت دسترسی شما";
            $l = 'users.index';
            return  view('admin.alert', compact('t', 'm', 'l'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
