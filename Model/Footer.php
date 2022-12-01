<?php
class Footer
{
    public $htmlFooter;
    public $cssFooter;

    public function __construct()
    {
        echo $this->setHtmlFooter().$this->setCssFooter();
    }

    public function setHtmlFooter(){
        return '
        <footer>
        //todo
        </footer>';

    }
    public function setCssFooter(){
        return '
        <style>
        footer{
            border-top: 1px solid black;
            width: 100%;
            height: 20%;
        }
        </style>
        ';
    }

}

;?>