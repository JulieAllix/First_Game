<?php

namespace Breakfree\Models;

use Breakfree\Utils\Database;
use PDO;

class Level extends CoreModel {

    private $name;

    public function findAllByLevelId($levelId){
        // We write the SQL request that will return all the information about the levels 
        $sql = '
        SELECT *
        FROM `level`
        WHERE id = ' . $levelId . '
        ';
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $levels = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        return $levels;
    }

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
}