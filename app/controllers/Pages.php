<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Pages extends Controller
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function index()
    {
        $this->view('pages/index');
    }

    public function login()
    {
        $this->view('pages/login');
    }

    public function register()
    {
        $this->view('pages/register');
    }
    public function forgetpassword()
    {
        $this->view('pages/forget_password');
    }

    public function otp()
    {
        $this->view('pages/otp');
    }

    public function changepassword()
    {
        $this->view('pages/changepassword');
    }
}
