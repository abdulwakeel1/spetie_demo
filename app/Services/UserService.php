<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Socialite;
use Auth;

class UserService
{
	// public function __construct(UserRepository $user)
	// {
	// 	$this->user = $user ;
	// }

	public function register(array $data)
	{
		$user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        if($data['type']  == 1){
            // $role = Role::create(['name' => 'admin', 'guard_name' => 'api']);
            $user->assignRole('admin');
            // return redirect('home');
        }
        if($data['type']  == 2){
            // $role = Role::create(['name' => 'buyer']);
            $user->assignRole('buyer');
            // return return redirect('home');
        }

        return $user;
    }
    
    public function registerGitUser()
    {
        $user = Socialite::driver('github')->user();
        dd($user);
    }

    public function validateData(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => 'required',
        ]);
    }

}