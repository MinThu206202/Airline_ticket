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

        $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

        $store_otp = [
            'otp' => $otp
        ];

        $id = $user['id'];

        $otp = $this->authRepositories->storeotp($id, $store_otp);

        return  [
            'success' => true,
            'email' => $email,
        ];
    }

    public function otp($data)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $email = $_SESSION['email'] ?? null;

        // Join the OTP array into a single string
        $otpInput = $data['otp'] ?? [];
        $otp = is_array($otpInput) ? implode('', $otpInput) : (string) $otpInput;

        if ($otp === '') {
            return ['error' => 'OTP is required'];
        }

        $result = $this->authRepositories->getbyemail($email) ?? [];
        $storedOtp = $result['otp'] ?? '';

        if (is_array($storedOtp)) {
            $storedOtp = implode('', $storedOtp);
        } else {
            $storedOtp = (string) $storedOtp;
        }

        if ($storedOtp !== $otp) {
            return ['error' => 'Invalid OTP'];
        }

        return [
            'success' => 'success',
            'email'   => $email
        ];
    }

    public function changepassword($data)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $email = $_SESSION['email'] ?? null;
        $newpassword = $data['new'];
        $confirmpassword = $data['confirm'];

        if (!$newpassword || !$confirmpassword) {
            return ['error' => 'Password is required'];
        }

        if ($newpassword !== $confirmpassword) {
            return ['error' => 'Password do not match'];
        }

        $newpassword = base64_encode($data['new']);
        $confirmpassword = base64_encode($data['confirm']);

        $id = $this->authRepositories->getbyemail($email);


        $result = $this->authRepositories->changepassword($id['id'], ['password' => $newpassword]);
        return [
            'success' => true
        ];
    }
}
