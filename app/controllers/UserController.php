<?php

namespace Controllers;

use Models\User;

class UserController
{
    public static function createUser($username, $email, $password)
    {
        $user = User::create([
            'username' => $username,
            'email' => $email,
            'password' => $password
        ]);

        return $user;
    }

    public function getUsers()
    {
        return User::get()->toArray();
    }
}
