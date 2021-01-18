<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;
// use App\Models\Permission;
// use App\Models\Role;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Services\UserService;



class RegisterController extends Controller
{
    use RegistersUsers;

    protected $userService;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct(UserService $userService)
    {
        $this->middleware('guest');
		$this->userService = $userService;
    }

    protected function validator(array $data)
    {
        return $this->userService->validateData($data);
    }

    protected function create(array $data)
    {
        return $this->userService->register($data);
    }
}
