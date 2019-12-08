<?php

namespace Breakfree\Controllers;

// the MainController class will get the necessary data and display the requested page
class MainController {

    protected $playerName; 
    protected $randomName;

    /*public function insertNamesInDB() {

        $sql = '
        INSERT INTO player (name, new_name) 
        VALUES ($this->playerName, $this->randomName)
        ';

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);
    
        // Avec les espaces de nom, on doit préciser à PDO
        // le FQCN pour qu'il puisse trouver la bonne classe
        // $brands = $pdoStatement->fetchAll(PDO::FETCH_CLASS, '\Oshop\Models\Brand');
        // Petite astuce, on peut utiliser __CLASS__ pour récupérer
        // automatiquement le nom de la classe dans laquelle on est
        $brands = $pdoStatement->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    
        return $brands;
    }*/



    // method to display the home page
   // public function homeAction($playerName, $randomName) {
    public function homeAction() {

        $playerName = $_COOKIE['player_name'];
        $randomName = $_COOKIE['random_name'];
        $this->setPlayerName($playerName);
        $this->setRandomName($randomName);
        //$this->insertNamesInDB();

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