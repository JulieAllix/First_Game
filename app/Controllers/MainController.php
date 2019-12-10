<?php

namespace Breakfree\Controllers;

use Breakfree\Models\{Player, Scores, Level};

// the MainController class will get the necessary data and display the requested page
class MainController {
    
    // method used to display the templates + page
    protected function show($viewName, $viewVars=array()) {
        $absoluteUrl = isset($_SERVER['BASE_URI']) ? $_SERVER['BASE_URI'] : '';
        require __DIR__.'/../views/header.tpl.php';
        require __DIR__.'/../views/'.$viewName.'.php';
        require __DIR__.'/../views/footer.tpl.php';
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
        // if there are no cookies yet related to the player id, level id and score id, we display a 404 page instead of the score page
        if(isset($_COOKIE['player_id']) && isset($_COOKIE['level_id']) && isset($_COOKIE['score'])){
        
            // we need to find the level name
            $levelModel = new Level();
            $levelId = $_COOKIE["level_id"];
            $levels = $levelModel->findAllByLevelId($levelId);
            $levelName = $levels[0]['name'];
            
            // here we need to extract the scores from the DB for a specific level id
            $scoreModel = new Scores();
            $scoreModel->getCookies();
            $scoreModel->insertScoreInDB();
            $scoreData = $scoreModel->findScoreByLevelId($levelId);

            $viewVars = [
                'title' => 'Scores page',
                'url' => '/scores',
                'score_data' => $scoreData,
                'level_name' => $levelName
            ];
            $this->show('scores', $viewVars);
        }
        else {
            // we display a 404 page
            header("HTTP/1.0 404 Not Found");
            echo 'Error 404 : You need to insert your name and play at least once before being able to access the scores page.';
            exit();
        }
    }

}