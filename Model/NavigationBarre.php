<?php 
class navBarre
{
    // Propriétés text
    public $onglet1 = "Accueil";
    public $onglet2 = "Formules";
    public $onglet3 = "Vérification Code";

    public function __construct()
    {
        echo $this->setHtmlNavBarre().$this->setCssNavBarre();
    }
    public function setHtmlNavBarre()
    {
         return '<nav class="navigation">
         <ul class="navigation__menu">
             <li class="navigation__menu--item"><a href="">'.$this->onglet1.' </a></li>
             <li class="navigation__menu--item"><a href="">'.$this->onglet2.'</a></li>
             <li class="navigation__menu--item"><a href="">'.$this->onglet3.'</a></li>
         </ul>
     </nav>';
    }
    public function setCssNavBarre(){
        return "
        <style>
        .navigation{
            width: 100%;
            position: fixed;

            border-bottom:1px solid black ;
        }
        .navigation__menu{
            display: flex;
            flex-direction: row;
            justify-content: flex-end;

            list-style-type: none;
        }
        .navigation__menu--item{
            margin-right: 5%;
        }
        .navigation a:link{
            text-decoration: none;
            font-family: cursive;
        }
        .navigation a:visited{
            color: black;
        }
        </style>
        ";
    }
}
;?>

