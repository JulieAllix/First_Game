<?php

// the MainController class will get the necessary data and display the requested page
class LevelController {

    // method to display the very easy page
    public function veryEasyAction() {
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
}