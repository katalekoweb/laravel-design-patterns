<?php

namespace App\Factories;

use App\Models\User;

class UserFactory
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Create and save a user.
     * Function: createUser
     * @param array $data
     * @return User
     */
    public function createUser(array $data) : User
    {
        # the factory design pattern is only for object creation
        return new User($data);
    }

}
