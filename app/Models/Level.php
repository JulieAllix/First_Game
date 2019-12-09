<?php

namespace Breakfree\Models;

//use Breakfree\Utils\Database;
//use PDO;

class Level extends CoreModel {

    private $name;

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