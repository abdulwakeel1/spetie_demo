<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
// use Socialite;
use Auth;
// use Exception;
use App\Models\User;
use App\Services\UserService;


class SocialGithubController extends Controller
{

	protected $userService;

	public function __construct(UserService $userService)
	{
		$this->userService = $userService;
	}

    public function AdminToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

	public function handleCallback()
    {
        try {
            $this->userService->registerGitUser();
        } catch (\Throwable $th) {
            //throw $th;
        }

        // $user = Socialite::driver('github')->user();
        // dd($user);
        // $finduser = User::where('social_id', $user->id)->first();
        // dd($finduser);
      
        // if($finduser)
        // {
        //     Auth::login($finduser);
            // dd("yes");
 
 			// return $finduser;
            // return redirect('/home');
      
        // }
        // else
        // {
        //     $newUser = User::create([
        //         'name' => $user->name,
        //         'email' => $user->email,
        //         'social_id'=> $user->id,
        //         'social_type'=> 'github',
        //         'password' => encrypt('github123456'),
        //     ]);
 
        //     Auth::login($newUser);
  
        //     return redirect('/home');
        // }

        // try 
        // {
        // 	$this->githubservice->register();
        //     return redirect('/seller-dashboard');
        // } 
        // catch (Exception $e) {
        //     dd($e->getMessage());
        // }
    }
}

