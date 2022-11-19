<?php

class PasswordConnection
{
    private string $host = 'db';
    private string $username = 'root';
    private string $password = 'root';
    private string $database = 'howsecureismypasswd';
    private int $port = 3306;

    public function connect()
    {
        $connection = new mysqli($this->host, $this->username, $this->password, $this->database, $this->port);
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
        $sql = "INSERT INTO passwords VALUES ('" . $passwordModel->getPassword() . "','" . $passwordModel->getIp() . "', '" . $passwordModel->getDate() . "'";
        $connection->query($sql);
        $connection->close();

        return $connection->stat();
    }
}