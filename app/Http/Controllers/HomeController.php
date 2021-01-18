<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
// use App\Models\Permission;
// use App\Models\Role;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Auth;

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
        $user = Auth::user();

        // $role = Role::create(['name' => 'buyer', 'guard_name' => 'buyer_guard']);
        
        // $user->hasPermissionTo('buyer');
        // $user->assignRole('buyer');
        // $user->givePermissionTo('buyer');

        // dd($user);
        return view('home');
    }
}
