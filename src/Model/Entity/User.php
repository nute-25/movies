<?php
// src/Model/Entity/Users.php

namespace App\Model\Entity;

// équivaut à un import
use Cake\ORM\Entity;

class User extends Entity {
    
    // tous est accessible et modifiable sauf l'id que l'on protège
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

}