<?php

// the MainController class will get the necessary data and display the requested page
class MainController {

    // method to display the home page
    public function homeAction() {
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
}