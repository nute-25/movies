<?php
// src/Model/Entity/Comments.php

namespace App\Model\Entity;

// équivaut à un import
use Cake\ORM\Entity;

class Comment extends Entity {
    
    // tous est accessible et modifiable sauf l'id que l'on protège
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

}