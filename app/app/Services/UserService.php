<?php

namespace App\Services;

use App\Factories\UserFactory;
use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;

class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected UserFactory $userFactory)
    {
        //
    }

    /**
     * Create user model instance and save.
     * Function: createAndSave
     * @param array $request
     * @return User
     */
    public function createAndSave(array $request) : User
    {
        $user = $this->userFactory->createUser($request);
        $user->save();
        return $user;
    }

    public function fecthUsers () {
        return User::all();
    }
}
