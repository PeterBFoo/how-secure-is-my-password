<?php

class PasswordService
{
    private $timeTypes = [
            "años" => 31556926,
            "dias" => 86400,
            "horas" => 3600,
            "minutos" => 60,
            "segundos" => 1
        ];

    private $machines = [
        "CPU" => 1000000,
        "GPU" => 10000000000,
        "GRID" => 1000000000000
    ];

    private function calculateTimeToDecrypt($password, $machine): array
    {
        $ocurrences = ["años" => 0, "dias" => 0, "horas" => 0, "minutos" => 0, "segundos" => 0];

        $time = pow(256, strlen($password)) / $this->machines[$machine];
        $time = round($time);

        while ($time > 0) {
            foreach ($this->timeTypes as $key => $value) {
                if ($time > $value) {
                    $ocurrences[$key] = round($time / $value, 0, PHP_ROUND_HALF_DOWN);
                    $time = $time % $value;
                }
            }
        }

        return $ocurrences;
    }


    public function getTimeToDecrypt($password, $machine)
    {
        return $this->calculateTimeToDecrypt($password, $machine);;
    }

    public function getPasswords()
    {
        require '/var/www/html/repository/PasswordConnection.php';
        $passwordConnection = new PasswordConnection();
        $passwords = $passwordConnection->getPasswords();
        $passwordsArray = array();
        while ($row = $passwords->fetch_assoc()) {
            $password = new PasswordModel($row["password"], $row["ip"], $row["date"]);
            array_push($passwordsArray, $password);
        }
        return $passwordsArray;
    }

    public function persist($password, $ip)
    {
        require '/var/www/html/repository/PasswordConnection.php';
        require '/var/www/html/model/PasswordModel.php';
        $passwordConnection = new PasswordConnection();
        $passwordModel = new PasswordModel($password, $ip, new DateTime('now'));
        $passwordConnection->persist($passwordModel);
    }
}