<?php 

interface AuthInterface{
    public function getbyId(int $id);
    public function getbyemail(string $email);
    public function readAll();
}