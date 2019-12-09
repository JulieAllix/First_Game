<?php

namespace Breakfree\Models;

class CoreModel {

    protected $id;

    public function setCookie($name, $value){
        // the cookie will expire in 24 hours
        setcookie($name, $value, time()+86400);
    }

    /**
     * Set the value of id
     *
     */ 
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}