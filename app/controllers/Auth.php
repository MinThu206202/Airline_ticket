<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "/../Services/AuthService.php";

class Auth extends Controller{

    private AuthService $service;
    public function __construct(?AuthService $service = null)    {
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
            redirect('dashboard');
            return;
        }

        // Initial page load (no POST)
        $this->view('pages/login');
    }
}


?>