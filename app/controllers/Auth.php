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

            if (isset($result['error'])) {
                // Show error in login page
                $this->view('pages/login', ['error' => $result['error']]);
                return;
            }

            // Login success → Store session & redirect
            $_SESSION['user_id'] = $result['user']['id'];
            $_SESSION['user_name'] = $result['user']['name'];
            $_SESSION['user_email'] = $result['user']['email'];

            header('Location: /dashboard');
            exit;
        }

        // GET request → just show login form
        $this->view('pages/login');
    }
    

}


?>