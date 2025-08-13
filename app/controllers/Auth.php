<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "/../Services/AuthService.php";

class Auth extends Controller
{

    private AuthService $service;
    public function __construct(?AuthService $service = null)
    {
        if ($service === null) {
            $db = new Database();
            $repo = new AuthRepositories($db);
            $service = new AuthService($repo);
        }
        $this->service = $service;
    }

    public function index()
    {
        $this->view('pages/index');
    }


    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->service->login($_POST);

            // If there's an error, pass it to the view
            if (isset($result['error'])) {
                $data = ['error' => $result['error']];
                $this->view('pages/login', $data);
                return;
            }

            // If successful, redirect or do something else
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['user_name'] = $result['name'];
            $this->view('user/home');
            return;
        }

        // Initial page load (no POST)
        $this->view('pages/login');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $result = $this->service->register($_POST);

            // If there's an error, pass it to the view
            if (isset($result['error'])) {
                $data = ['error' => $result['error']];
                $this->view('pages/register', $data);
                return;
            }

            // If successful, redirect or do something else
            $_SESSION['user_id'] = $result;
            $this->view('pages/login');
            return;
        }

        // Initial page load (no POST)
        $this->view('pages/register');
    }

    public function forget_password()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $result = $this->service->forget_password($_POST);

            // If there's an error, pass it to the view
            if (isset($result['error'])) {
                $data = ['error' => $result['error']];
                $this->view('pages/forget_password', $data);
                return;
            }

            // If successful, redirect or do something else
            session_start();
            $_SESSION['email'] = $result['email'];
            // var_dump($_SESSION['email']);
            // die();
            redirect('pages/otp');
            exit();
        }

        // Initial page load (no POST)
        $this->view('pages/forget_password');
    }
}
