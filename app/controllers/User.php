<?php 

class User extends Controller{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function home()
    {
        $this->view('user/home');
    }

    public function mybooking()
    {
        $this->view('user/my_booking');
    }

    public function profile()
    {
        $this->view('user/profile');
    }

    public function support()
    {
        $this->view('user/support');
    }

    public function bookingform()
    {
        $this->view('user/booking_form');
    }

    public function flight_result()
    {
        $this->view('user/flight_result');
    }

    public function booking_form()
    {
        $this->view('user/booking_form');
    }
    public function payment()
    {
        $this->view('user/payment');
    }
}

?>