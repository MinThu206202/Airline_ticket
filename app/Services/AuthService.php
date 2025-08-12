<?php

require_once __DIR__ . '/../Repositories/AuthRepositories.php';

class AuthService
{
    private AuthRepositories $authRepositories;

    public function __construct(AuthRepositories $authRepositories)
    {
        $this->authRepositories = $authRepositories;
    }

    public function login(array $data)
    {
        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;


        if (!$email || !$password) {
            return ['error' => 'Email and password are required.'];
        }

        $user = $this->authRepositories->getbyemail($email);

        if (!$user) {
            return ['error' => 'User not Found'];
        }
        if ($password !== base64_decode($user['password'])) {
            return ['error' => 'Invalid password'];
        }


        return [
            'success' => true,
            'email'   => $user['email'],
            'name'    => $user['name'],
            'id'      => $user['id']
        ];
        // echo "kyaw";
        // die();
    }

    public function register()
    {
        $id = $_POST['id'];
        $user = $this->authRepositories->getbyemail($id);
    }
}
