<?php

// we create a PDO object which will enable to connect to the DB

$dsn =  'mysql:dbname=BreakFree;host=localhost;charset=UTF8';
$user = 'BreakFree';
$password = 'BreakFree';

try {
    $pdo = new PDO(
        $dsn,
        $user,
        $password,
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT
        )
    );
} catch (PDOException $exception) {
    echo 'Error while connecting to the DB : ' . $exception->getMessage();
}

// we check that the PDO object was created and that the connexion is ok
var_dump($pdo);




