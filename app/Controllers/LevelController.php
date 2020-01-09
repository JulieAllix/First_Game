<?php

namespace Breakfree\Controllers;

use Breakfree\Models\Level;

// the MainController class will get the necessary data and display the requested page
class LevelController {

    protected $score;

    // method to display the very easy page
    public function veryEasyAction() {

        $levelModel = new Level();
        $levelModel->setCookie('level_id','1');

        $viewVars = [
            'title' => 'Very easy level',
            'url' => '/very-easy'
        ];
        $this->show('very-easy-level', $viewVars);
    }

    // method to display the easy page
    public function easyAction() {

        $levelModel = new Level();
        $levelModel->setCookie('level_id','2');

        $viewVars = [
            'title' => 'Easy level',
            'url' => '/easy'
        ];
        $this->show('easy-level', $viewVars);
    }

    // method to display the medium page
    public function mediumAction() {

        $levelModel = new Level();
        $levelModel->setCookie('level_id','3');

        $viewVars = [
            'title' => 'Medium level',
            'url' => '/medium'
        ];
        $this->show('medium-level', $viewVars);
    }

    // method to display the hardcore page
    public function hardcoreAction() {

        $levelModel = new Level();
        $levelModel->setCookie('level_id','4');

        $viewVars = [
            'title' => 'Hardcore level',
            'url' => '/hardcore'
        ];
        $this->show('hardcore-level', $viewVars);
    }

    // method used to display the templates + page
    private function show($viewName, $viewVars) {
        $absoluteUrl = isset($_SERVER['BASE_URI']) ? $_SERVER['BASE_URI'] : '';
        //var_dump($viewName);
        require __DIR__.'/../views/headers-footers/header.tpl.php';
        require __DIR__.'/../views/headers-footers/header-level.tpl.php';
        require __DIR__.'/../views/level/'.$viewName.'.php';
        require __DIR__.'/../views/headers-footers/footer-level.tpl.php';
        require __DIR__.'/../views/headers-footers/footer.tpl.php';
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