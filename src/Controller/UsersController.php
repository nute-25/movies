<?php
// src/Controller/UsersController.php

// espace logique auquel appartient le controller
namespace App\Controller;

use Cake\Http\Exception\NotFoundException;

class UsersController extends AppController {

    // affiche le contenu de la BDD
    public function index() {
        // $this représente l'app de manière générale
        $u = $this->Users->find();
        // on transmet le contenu stocké dans $q à la view
        $this->set(compact('u'));
    }

    public function add() {
        // on créé une entité vide
        $new = $this->Users->newEntity();

        // si on arrive sur cette action en methode POST
        if ($this->request->is('post')) {
            // patchEntity recupére les données saisies par l'user dans le form et de l'envoyer vers l'objet Users puis la BDD
            //on met les données de l'utilisateur dans l'objet $new
            $new = $this->Users->patchEntity($new, $this->request->getData());

            // si la sauvegarde fonctionne, on confirme et on redirige vers la liste globale des citations
            if($this->Users->save($new)) {
                // les messages flash sont enregistrés en mémoire tant qu'ils ne sont pas affichés sur une page
                $this->Flash->success('Ok');

                return $this->redirect(['action' => 'index']);
            }

            // [pour qu'on arrive ici, la sauvegarde a planté] on gueule sur l'internaute
            $this->Flash->error('Planté');
        }

        //envoie la variable à la vue
        $this->set(compact('new'));
    }
}
