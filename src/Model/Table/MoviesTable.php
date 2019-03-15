<?php
// src/Model/Table/MoviesTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class MoviesTable extends Table {
    
    public function initialize(array $config) {
        // demande à Cake de gérer les created et modified
        // addBehavior fait le lien avec timestamp existant déjà dans cake
        $this->addBehavior('Timestamp');
        $this->addBehavior('Image');
    }

    // ennonce les règles de validation pour ce type de data
    // on surchage la methode validationDefault existant déjà dans la class Table dont MoviesTable hérite
    public function validationDefault(Validator $v) {
        $v->notEmpty('title')
            ->maxLength('title', 300)
            ->allowEmpty('director')
            ->maxLength('director', 300)
            ->allowEmpty('poster')
            ->allowEmpty('duration')
            ->allowEmpty('releasedate')
            ->allowEmpty('synopsis');
        return $v;
    }
}