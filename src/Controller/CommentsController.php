<?php
// src/Controller/CommentsController.php

// espace logique auquel appartient le controller
namespace App\Controller;

class CommentsController extends AppController {
    
    public function add () {
        $new = $this->Comments->newEntity();

        if ($this->request->is('post')) {
            $new = $this->Comments->patchEntity($new, $this->request->getData());

            // USER : c'est l'id de celui qui est connecté
            $new->user_id = $this->Auth->user('id');

            if($this->Comments->save($new)) {
                $this->Flash->success('Le commentaire a été sauvegardé');
                // on redirige vers la page du film qu'on a commenté
                return $this->redirect(['controller' => 'movies', 'action' => 'view', $new->movie_id]);
            }
            $this->Flash->error('Try again');
        }
    }
}