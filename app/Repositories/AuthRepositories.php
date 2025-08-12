<?php 

require_once __DIR__ ."/../contracts/AuthInterface.php";

class AuthRepositories implements AuthInterface
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getbyId(int $id)
    {
        $this->db->getById('users',$id);
    }

    public function readAll()
    {
        $this->db->readAll('users');
    }

    public function getbyemail(string $email)
    {
       return $this->db->columnFilter('users','email',$email);
    }

}

?>