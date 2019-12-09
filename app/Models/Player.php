<?php

namespace Breakfree\Models;

use Breakfree\Utils\Database;
use PDO;

class Player extends CoreModel {
    protected $name;
    protected $new_name;

    public function getCookies() {
        $name = $_COOKIE['player_name'];
        $new_name = $_COOKIE['random_name'];
        $this->setName($name);
        $this->setNewName($new_name);
        $this->insertNamesInDB();
    }

    public function insertNamesInDB() {
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

    public function getPlayerId(){
        // we will select the player data of the latest line added to the table in the DB
        $sql = '
        SELECT *
        FROM `player`
        ORDER BY ID DESC LIMIT 1
        ';
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $playerData = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        $playerId = $playerData[0]['id'];
        $this->setId($playerId);
        //var_dump($playerId);
    }
/*
    public function setCookie(){
        // we add the player id to the cookies
        // it will expire in 24 hours
        setcookie('player_id', $this->id, time()+86400);
    }*/

        /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     */ 
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get the value of new_name
     */ 
    public function getNewName()
    {
        return $this->new_name;
    }

    /**
     * Set the value of new_name
     *
     */ 
    public function setNewName($new_name)
    {
        $this->new_name = $new_name;
    }

}