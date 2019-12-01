<?php 
    require 'controllers/MainController.php';
    require 'controllers/LevelController.php';
    //var_dump($MainController);
    // by default, we consider we are on the index page
    $pageToDisplay = '/';
    // thanks to the htaccess redirection, no querystring can be seen in the url. Htaccess will add the information about the requested page
    if (isset($_GET['_url'])) {
        $pageToDisplay = $_GET['_url'];
    }

    // here we define the routes : link between the requested url and the method of the Controller
    $routes = [
        '/' => [
            'action' => 'homeAction',
            'controller' => 'MainController'
        ],
        '/very-easy' => [
            'action' => 'veryEasyAction',
            'controller' => 'LevelController'
        ],
        '/easy' => [
            'action' => 'easyAction',
            'controller' => 'LevelController'
        ],
        '/medium' => [
            'action' => 'mediumAction',
            'controller' => 'LevelController'
        ],
        '/hardcore' => [
            'action' => 'hardcoreAction',
            'controller' => 'LevelController'
        ]
    ];
    //var_dump($routes[$pageToDisplay]);
    // we check if there is a page corresponding to the value of $pageToDisplay and we create a dispatcher
    if (isset($routes[$pageToDisplay])) {

        // we get the method + class of the controller to use in an array
        $routeData = $routes[$pageToDisplay];
       
        $methodToCall = $routeData['action'];
        
        $controllerToUse = $routeData['controller'];
        //var_dump($controllerToUse);

    
        // in order to dynamically call the correct controller + method, we use the variables $methodToCall et $controllerToUse
        //$controller = new $MainController();
        $controller = new $controllerToUse();
        //var_dump($controller);
        //var_dump($methodToCall);
        $controller->$methodToCall();
        $controller->homeAction;
    
    } else {
        // we display a 404 page
        header("HTTP/1.0 404 Not Found");
        echo 'Vous avez demandé une 404 ? La voici :';
        echo '<img src="http://www.roadsmile.com/images/peugeot-404_key_6.jpg"/>';
        exit();
    }  

   
    //require '../templates/header.tpl.php';
?>

        <!--<body>
            <header>
                <h1 class="game-title">I want to break free</h1>
            </header> -->
            

    


