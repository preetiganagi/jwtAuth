<?php

namespace App\Repositories\Elaquent;

use App\Models\User;

/**
* 
*/
class UserRepository implements UserRepositoryInterface
{
	protected $user;
	
	function __construct(User $user)
	{
		$this->user = $user;
	}
}