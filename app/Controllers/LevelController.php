<?php

namespace Breakfree\Controllers;

// the MainController class will get the necessary data and display the requested page
class LevelController {

    protected $score;
/*
    protected function getCookies() {
        $score = $_COOKIE['score'];
        $this->setScore($score);
        $this->insertDataInDB();
    }

    protected function insertDataInDB() {
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

    */

    // method to display the very easy page
    public function veryEasyAction() {
/*
        if(isset($_COOKIE['score'])){
            // enables to get the cookies data and insert it into the DB
            $this->getCookies();
            $this->getPlayerData();
        }
        */

        $viewVars = [
            'title' => 'Very easy level',
            'url' => '/very-easy'
        ];
        $this->show('very-easy-level', $viewVars);
    }

    // method to display the easy page
    public function easyAction() {
        $viewVars = [
            'title' => 'Easy level',
            'url' => '/easy'
        ];
        $this->show('easy-level', $viewVars);
    }

    // method to display the medium page
    public function mediumAction() {
        $viewVars = [
            'title' => 'Medium level',
            'url' => '/medium'
        ];
        $this->show('medium-level', $viewVars);
    }

    // method to display the hardcore page
    public function hardcoreAction() {
        $viewVars = [
            'title' => 'Hardcore level',
            'url' => '/hardcore'
        ];
        $this->show('hardcore-level', $viewVars);
    }

    // method used to display the templates + page
    private function show($viewName, $viewVars) {
        //var_dump($viewName);
        require __DIR__.'/../views/header.tpl.php';
        require __DIR__.'/../views/header-level.tpl.php';
        require __DIR__.'/../views/'.$viewName.'.php';
       // require __DIR__.'/../views/footer.tpl.php';
    }

    /**
     * Set the value of score
     *
     */ 
    public function setScore($score)
    {
        $this->score = $score;

    }
}