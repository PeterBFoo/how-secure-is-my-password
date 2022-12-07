<?php

class PasswordConnection
{
    private string $host = '192.168.56.5';
    private string $username = 'root';
    private string $password = 'cicle';
    private string $database = 'migranpassword';

    public function connect()
    {
        $connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($connection->connect_error) {
            die ("Connection failed: " . $connection->connect_error);
        }
        return $connection;
    }
    public function getPasswords() {
        $connection = $this->connect();
        $sql = "SELECT * FROM passwords";
        $response = $connection->query($sql);
        $connection->close();

        return $response;
    }

    public function persist(PasswordModel $passwordModel): string|bool
    {
        $connection = $this->connect();
        $sql = "INSERT INTO `passwords` (`password`, `ip`, `introducedAt`), VALUES (`" . $passwordModel->getPassword() . "`, `" . $passwordModel->getIp() . "`," . $passwordModel->getDate()  . ")";
        $connection->query($sql);
        $connection->close();
    }
}