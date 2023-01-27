<?php
require_once('model/m_admin.php');

function gestion()
{
    $activity = getInfoActivite();
    $situation = getInfoSituation();
    $option = getInfoFormule();

    require('view/v_admin.php');
}
