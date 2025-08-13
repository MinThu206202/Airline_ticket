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

    public function register(array $data)
    {

        $email = $data['email'] ?? null;
        $name = $data['name'] ?? null;
        $password = $data['password'] ?? null;

        if (!$email || !$name || !$password) {
            return ['error' => 'Required Failed'];
        }

        $password = base64_encode($password);

        $update_data = [
            'email' => $email,
            'name' => $name,
            'password' => $password
        ];

        $user = $this->authRepositories->getbyemail($email);

        if ($user) {
            return ['error' => 'Email is Already Register'];
        }

        $createuser = $this->authRepositories->create($update_data);
        return [
            'success' => true,
            'email'   => $email,
        ];
    }

    public function forget_password($data)
    {
        $email = $data['email'];
        if (!$email) {
            return ['error' => "Email is required"];
        }

        $user = $this->authRepositories->getbyemail($email);

        if (!$user) {
            return ['error' => "Mail is not already Register"];
        }

        return  [
            'success' => true,
            'email' => $email,
        ];
    }
}
