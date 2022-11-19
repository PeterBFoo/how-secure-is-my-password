<?php

class PasswordModel
{
    private $password;
    private $ip;
    private $date;

    public function __construct($password, $ip, $date)
    {
        $this->password = $password;
        $this->ip = $ip;
        $this->date = $date;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getIp() {
        return $this->ip;
    }

    public function getDate() {
        return $this->date;
    }
}