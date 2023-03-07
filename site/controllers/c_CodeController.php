<?php
require_once('pdo/codePDO.php');
class CodeController
{
    public function tryToGetCode()
    {

        $userInput = $_POST["code"];

        $codePDO = new CodePDO();
        $idCode = $codePDO->getId($userInput);

        return $idCode;
    }
}
