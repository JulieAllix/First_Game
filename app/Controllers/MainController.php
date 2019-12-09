<?php

namespace Breakfree\Controllers;

use Breakfree\Utils\Database;

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

    protected function getPlayerData(){
        // we will select the player Id of the latest line added to the table in the DB
        $sql = '
        SELECT *
        FROM `player`
        ORDER BY ID DESC LIMIT 1
        ';
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $playerData = $pdoStatement->fetchObject(__CLASS__);
        var_dump($playerData);
        return $playerData;
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
            $this->getCookies();
            $this->getPlayerData();
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
}