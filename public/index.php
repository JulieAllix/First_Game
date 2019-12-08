<?php 
    require '../vendor/autoload.php';
    require '../app/Controllers/MainController.php';
    require '../app/Controllers/LevelController.php';
    // we connect to the db
    //require 'db-connexion.php';

    //var_dump($MainController);
    // by default, we consider we are on the index page
    $pageToDisplay = '/';
    // thanks to the htaccess redirection, no querystring can be seen in the url. Htaccess will add the information about the requested page
    if (isset($_GET['_url'])) {
        $pageToDisplay = $_GET['_url'];
    }

    $router = new AltoRouter();
    // we indicate to AltoRouter where the root of the site is with basePath
    $router->setBasePath($_SERVER['BASE_URI']);


    // we define each route by calling map
    $router->map(
    'GET',
    '/', 
    [
        'action' => 'homeAction',
        'controller' => '\Breakfree\Controllers\MainController'
    ],
    'Home page'
    );

    $router->map(
        'GET',
        '/very-easy', 
        [
            'action' => 'veryEasyAction',
            'controller' => '\Breakfree\Controllers\LevelController'
        ],
        'Very easy level'
    );

    $router->map(
        'GET',
        '/easy', 
        [
            'action' => 'easyAction',
            'controller' => '\Breakfree\Controllers\LevelController'
        ],
        'Easy level'
    );

    $router->map(
        'GET',
        '/medium', 
        [
            'action' => 'mediumAction',
            'controller' => '\Breakfree\Controllers\LevelController'
        ],
        'Medium level'
    );

        $router->map(
        'GET',
        '/hardcore', 
        [
            'action' => 'hardcoreAction',
            'controller' => '\Breakfree\Controllers\LevelController'
        ],
        'Hardcore level'
    );

    // once the routes are added to AltoRouter, we check if there is a route matching the requested page
    $match = $router->match();
    //var_dump($match);

    // if a route was found, we will look for the information about the method and the controller in $match 
    if ($match) {
    $methodToCall = $match['target']['action'];
    $controllerToUse = $match['target']['controller'];

    $urlParams = $match['params'];
    //var_dump($urlParams);

    // in order to dynamically call the controller + method, we use the variables $methodToCall + $controllerToUse
    $controller = new $controllerToUse();
    $controller->$methodToCall($urlParams);

    } else {
        // we display a 404 page
        header("HTTP/1.0 404 Not Found");
        echo 'Vous avez demandé une 404 ? La voici :';
        echo '<img src="http://www.roadsmile.com/images/peugeot-404_key_6.jpg"/>';
        exit();
    }  

?>


            

    


