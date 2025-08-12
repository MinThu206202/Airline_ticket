<?php

require_once __DIR__ . '/../Repositories/AuthRepositories.php';

class AuthService
{
    private AuthRepositories $authRepositories;

    public function __construct(AuthRepositories $authRepositories)
    {
        $this->authRepositories = $authRepositories;
    }

    public function login(array $data): array
    {
        $email = trim($data['email'] ?? '');
        $password = trim($data['password'] ?? '');

        if ($email === '' || $password === '') {
            return ['error' => 'Email and password are required.'];
        }

        $user = $this->authRepositories->getByEmail($email);

        if (!$user) {
            return ['error' => 'User not found.'];
        }

        if (!password_verify($password, $user['password'])) {
            return ['error' => 'Invalid password.'];
        }

        // Success: return user data
        return [
            'success' => true,
            'user' => [
                'email' => $user['email'],
                'name' => $user['name'],
                'id' => $user['id']
            ]
        ];
    }
}
