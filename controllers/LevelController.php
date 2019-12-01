<?php

// the MainController class will get the necessary data and display the requested page
class LevelController {

    // method to display the very easy page
    public function veryEasyAction() {
        $this->show('very-easy-level', '/very-easy');
    }

    // method to display the easy page
    public function easyAction() {
        $this->show('easy-level', '/easy');
    }

    // method to display the medium page
    public function mediumAction() {
        $this->show('medium-level', '/medium');
    }

    // method to display the hardcore page
    public function hardcoreAction() {
        $this->show('hardcore-level', '/hardcore');
    }

    // method used to display the templates + page
    private function show($viewName, $url) {
        var_dump($viewName);
        require __DIR__.'/../php/templates/header.tpl.php';
        require __DIR__.'/../php/templates/header-level.tpl.php';
        require __DIR__.'/../php/pages/'.$viewName.'.php';
       // require __DIR__.'/../php/templates/footer.tpl.php';
    }
}