<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // If you fresh your database please use this too make some permissions and roles...
        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'user']);

        // auth()->user()->assignRole('admin');
        // auth()->user()->removeRole('user');

        // Permission::create(['name' => 'edit-user']);
        // Permission::create(['name' => 'upload-file']);
        // Permission::create(['name' => 'destroy-file']);
        // Permission::create(['name' => 'create-page']);
        // Permission::create(['name' => 'edit-page']);
        // Permission::create(['name' => 'edit-static-setting']);
        // Permission::create(['name' => 'add-tab']);
        // Permission::create(['name' => 'edit-tab']);


        // auth()->user()->givePermissionTo('edit-user');

        return view('home');
    }
}
