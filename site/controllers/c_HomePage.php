<?php
require_once('model/pool.php');
require_once('pdo/poolPDO.php');

class HomePage {

    public $pools;
    public $selectPool;

    function __construct()
    {
        $poolPDO = new PoolPDO();
        $poolPDO->connection = new DBConnection();
        $this->pools = $poolPDO->readAll();
        $this->selectPool =  $this->pools[0];
    } 

    function printPools(){
        foreach ($this->pools as $pool) {
            echo '<div class="card">';
            echo ' <img class="SwimmingPool--Img" src="' . $pool->getPicture() . '" value="' . $pool->getName() . '*' . $pool->getAddress() . '*' . $pool->getDescription() . '*' . $pool->getMap() . '" alt="" onclick="PiscineClickEvent(this)">';
            echo '<div class="poolName">' . $pool->getName() . '</div>';
            echo '</div>';
        }
    }

    function printPoolName(){
        echo  '<h1 id="FocusSwimmingPool--Title">' . $this->selectPool->getName() . '</h1>';
    }

    function printPoolAddress(){
       echo '<p id="FocusSwimmingPool--Address">' . $this->selectPool->getAddress() . '<p>';
    }

    function printDescription(){
        echo '<p id="FocusSwimmingPool--Descriptif">' . $this->selectPool->getDescription() . '<p></br>';
    }

    function printMap(){
        echo ' <img id="FocusSwimmingPool--Map" src="' . $this->selectPool->getMap() . '" alt="">';
    }
}
   