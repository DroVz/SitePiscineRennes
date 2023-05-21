<?php
class CodeVerification
{
    public function printDefaultValue()
    {
        echo '<input type="text" name="code" id="code" maxlength=9 placeholder="' . $this->getDefaultValue() . '"/>';
    }
    private function getDefaultValue()
    {
        $returnValue = 'XXXX-XXXX';
        $action = htmlspecialchars($_GET['action']);
        if ($action == 'codeRedirection') {
            $returnValue = 'Code incorrect';
        }
        return $returnValue;
    }
}
