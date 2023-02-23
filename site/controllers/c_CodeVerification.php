<?php 
class CodeVerification {
    public function printDefaultValue(){
        echo '<input type="text" name="code" id="code" maxlength=9 placeholder="'. $this->getDefaultValue() .'"/>';
    }
    private function getDefaultValue(){
        $returnValue = 'XXXX-XXXX';
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if ($action == 'codeRedirection'){
            $returnValue = 'Code Incorect';
        }
        return $returnValue;
    }
}