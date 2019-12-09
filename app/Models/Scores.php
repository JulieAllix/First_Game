<?php

namespace Breakfree\Models;

use Breakfree\Utils\Database;
use PDO;

class Scores extends CoreModel {

    protected $level_id;
    protected $player_id;
    protected $score;

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
}