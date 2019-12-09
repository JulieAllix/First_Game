<?php

namespace Breakfree\Models;

use Breakfree\Utils\Database;
use PDO;

class Scores extends CoreModel {

    protected $level_id;
    protected $player_id;
    protected $score;
    protected $level_name;
    protected $player_name;
    protected $player_newname;

    public function getCookies() {
        $level_id = $_COOKIE['level_id'];
        $player_id = $_COOKIE['player_id'];
        $score = $_COOKIE['score'];
        $this->setLevelId($level_id);
        $this->setPlayerId($player_id);
        $this->setScore($score);
        //$this->insertScoreInDB();
    }

    public function insertScoreInDB(){
        // we cannot directly transmit php variables into the DB, thus, for the moment, we replace the values by "?"
        $sql = "
        INSERT INTO scores (level_id, player_id, score) 
        VALUES (?, ?, ?)
        ";
        $pdo = Database::getPDO();
        // this is where we can transmit the php variables into SQL
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->level_id, $this->player_id, $this->score]);
    }

    public function findScoreDataFromDB(){
        $sql = '
            SELECT `scores`.*,
            level.name AS level_name, player.name AS player_name, player.new_name AS player_newname
            FROM `scores`
            JOIN `level`
            ON scores.level_id = level.id
            JOIN `player`
            ON scores.player_id = player.id
            ORDER BY score DESC
            LIMIT 20
        ';

        // Database::getPDO() returns a PDO object representing the connexion to the database 
        $pdo = Database::getPDO();

        // We execute the request in order to get our results
        $pdoStatement = $pdo->query($sql);

        // We will get the results as a table of objects from the 'Character' class
        $scoreData = $pdoStatement->fetchAll(PDO::FETCH_CLASS,__CLASS__);

        return $scoreData;
    }

    /**
     * Get the value of level_id
     */ 
    public function getLevelId()
    {
        return $this->level_id;
    }

    /**
     * Set the value of level_id
     *
     */ 
    public function setLevelId($level_id)
    {
        $this->level_id = $level_id;
    }

    /**
     * Get the value of player_id
     */ 
    public function getPlayerId()
    {
        return $this->player_id;
    }

    /**
     * Set the value of player_id
     *
     */ 
    public function setPlayerId($player_id)
    {
        $this->player_id = $player_id;
    }

    /**
     * Get the value of score
     */ 
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set the value of score
     *
     */ 
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * Get the value of level_name
     */ 
    public function getLevelName()
    {
        return $this->level_name;
    }

    /**
     * Set the value of level_name
     *
     * @return  self
     */ 
    public function setLevelName($level_id)
    {
        
        $this->level_name = $level_name;

        return $this;
    }

    /**
     * Get the value of player_newname
     */ 
    public function getPlayerNewname()
    {
        return $this->player_newname;
    }

    /**
     * Get the value of player_name
     */ 
    public function getPlayerName()
    {
        return $this->player_name;
    }

}