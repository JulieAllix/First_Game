<?php

namespace Breakfree\Controllers;

use Breakfree\Utils\Database;

// the MainController class will get the necessary data and display the requested page
class MainController {

    protected $playerName; 
    protected $randomName;

    
    public function insertNamesInDB() {

        // we cannot directly transmit php variables into the DB, thus, for the moment, we replace the values by "?"
        $sql = "
        INSERT INTO player (name, new_name) 
        VALUES (?, ?)
        ";

        $pdo = Database::getPDO();

        // this is where we can transmit the php variables into SQL
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->playerName, $this->randomName]);

    }

    // method to display the home page
    public function homeAction() {
        if(isset($_COOKIE['player_name'])){
            $playerName = $_COOKIE['player_name'];
            $randomName = $_COOKIE['random_name'];
            $this->setPlayerName($playerName);
            $this->setRandomName($randomName);
            $this->insertNamesInDB();
        }

        $viewVars = [
            'title' => 'Homepage',
            'url' => '/'
        ];
        $this->show('home', $viewVars);
    }

    // method used to display the templates + page
    private function show($viewName, $viewVars=array()) {
        require __DIR__.'/../views/header.tpl.php';
        require __DIR__.'/../views/'.$viewName.'.php';
       // require __DIR__.'/../views/footer.tpl.php';
    }

    /**
     * Get the value of playerName
     */ 
    public function getPlayerName()
    {
        return $this->playerName;
    }

    /**
     * Set the value of playerName
     *
     */ 
    public function setPlayerName($playerName)
    {
        $this->playerName = $playerName;

    }

    /**
     * Get the value of randomName
     */ 
    public function getRandomName()
    {
        return $this->randomName;
    }

    /**
     * Set the value of randomName
     *
     */ 
    public function setRandomName($randomName)
    {
        $this->randomName = $randomName;

    }
}