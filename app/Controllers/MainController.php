<?php

namespace Breakfree\Controllers;

use Breakfree\Utils\Database;
use PDO;

// the MainController class will get the necessary data and display the requested page
class MainController {

    protected $name; 
    protected $new_name;
    protected $id;

    protected function getCookies() {
        $name = $_COOKIE['player_name'];
        $new_name = $_COOKIE['random_name'];
        $this->setName($name);
        $this->setNewName($new_name);
        $this->insertNamesInDB();
    }

    protected function insertNamesInDB() {
        // we cannot directly transmit php variables into the DB, thus, for the moment, we replace the values by "?"
        $sql = "
        INSERT INTO player (name, new_name) 
        VALUES (?, ?)
        ";
        $pdo = Database::getPDO();
        // this is where we can transmit the php variables into SQL
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->name, $this->new_name]);
    }

    protected function getPlayerId(){
        // we will select the player data of the latest line added to the table in the DB
        $sql = '
        SELECT *
        FROM `player`
        ORDER BY ID DESC LIMIT 1
        ';
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $playerData = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        $playerId = $playerData[0]['id'];
        $this->setId($playerId);
        //var_dump($playerId);
    }

    protected function setCookie(){
        // we add the player id to the cookies
        // it will expire in 24 hours
        setcookie('player_id', $this->id, time()+86400);
    }
    
    // method used to display the templates + page
    protected function show($viewName, $viewVars=array()) {
        require __DIR__.'/../views/header.tpl.php';
        require __DIR__.'/../views/'.$viewName.'.php';
       // require __DIR__.'/../views/footer.tpl.php';
    }

    // method to display the home page
    public function homeAction() {
        if(isset($_COOKIE['player_name'])){
            // enables to get the cookies data and insert it into the DB
            $this->getCookies();
            $this->getPlayerId();
            $this->setCookie();
        }
        $viewVars = [
            'title' => 'Homepage',
            'url' => '/'
        ];
        $this->show('home', $viewVars);
    }


    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     */ 
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get the value of new_name
     */ 
    public function getNewName()
    {
        return $this->new_name;
    }

    /**
     * Set the value of new_name
     *
     */ 
    public function setNewName($new_name)
    {
        $this->new_name = $new_name;
    }

    /**
     * Set the value of id
     *
     */ 
    public function setId($id)
    {
        $this->id = $id;
    }
}