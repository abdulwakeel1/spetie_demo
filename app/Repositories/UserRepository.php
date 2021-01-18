<?php

namespace App\Repositories;

use App\Models\User;
use Services\UserService;

class UserRepository
{
	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}



}