<?php
// src/Model/Table/UsersTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table {
    
    public function initialize(array $config) {
        // demande à Cake de gérer les created et modified
        // addBehavior fait le lien avec timestamp existant déjà dans cake
        $this->addBehavior('Timestamp');
    }

    // ennonce les règles de validation pour ce type de data
    // on surchage la methode validationDefault existant déjà dans la class Table dont MoviesTable hérite
    public function validationDefault(Validator $v) {
        $v->notEmpty('pseudo')
            ->maxLength('pseudo', 50)
            ->notEmpty('password');
        return $v;
    }
}