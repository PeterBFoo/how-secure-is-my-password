<?php

class PasswordResource
{
    public function getPasswords()
    {
        require '/var/www/migranpassword/service/PasswordService.php';
        $passwordService = new PasswordService();
        return $passwordService->getPasswords();
    }

    public function persist($password, $ip) {
        require_once '/var/www/html/service/PasswordService.php';
        $passwordService = new PasswordService();
        $passwordService->persist($password, $ip);
    }

    public function getTime($password, $machine) {
        require '/var/www/html/service/PasswordService.php';
        $passwordService = new PasswordService();
        return $passwordService->getTimeToDecrypt($password, $machine);
    }
}