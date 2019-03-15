<?php
// src/Model/Entity/Users.php

namespace App\Model\Entity;

// équivaut à un import
use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class User extends Entity {
    
    // tous est accessible et modifiable sauf l'id que l'on protège
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected function _setPassword($value) {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }
}