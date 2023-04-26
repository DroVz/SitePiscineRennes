<?php
require_once('pdo/pooluserPDO.php');

class AdminController
{
    public function tryToGetAdmin(): int
    {
        $userInputLogin = $_POST['login'];
        $userInputPwd = $_POST['pwd'];
        $pooluserPDO = new PooluserPDO();
        $userID = $pooluserPDO->getId($userInputLogin, $userInputPwd);
        return $userID;
    }
}
