<?php

namespace Breakfree\Controllers;

use Breakfree\Models\{Player, Scores};

// the MainController class will get the necessary data and display the requested page
class MainController {
    
    // method used to display the templates + page
    protected function show($viewName, $viewVars=array()) {
        require __DIR__.'/../views/header.tpl.php';
        require __DIR__.'/../views/'.$viewName.'.php';
       // require __DIR__.'/../views/footer.tpl.php';
    }

    // method to display the home page
    public function homeAction() {

        if(isset($_COOKIE['player_name'])){
            $playerModel = new Player();
            // enables to get the cookies data and insert it into the DB
            $playerModel->getCookies();
            $playerModel->insertNamesInDB();
            $playerModel->getPlayerId();
            $playerId = $playerModel->getId();
            $playerModel->setCookie('player_id',  $playerId);
        }
        $viewVars = [
            'title' => 'Homepage',
            'url' => '/'
        ];
        $this->show('home', $viewVars);
    }

    public function scoreAction(){
        $scoreModel = new Scores();

        $scoreModel->getCookies();
        $scoreModel->insertScoreInDB();
        $scoreData = $scoreModel->findScoreDataFromDB();
        
        $scoreModel->setLevelName($this->level_id);
        $levelName = $scoreModel->getLevelName();

        $viewVars = [
            'title' => 'Scores page',
            'url' => '/scores',
            'score_data' => $scoreData,
            'level_name' => $levelName
        ];
        $this->show('scores', $viewVars);
    }

}