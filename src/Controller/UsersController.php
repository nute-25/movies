<?php
// src/Controller/UsersController.php

// espace logique auquel appartient le controller
namespace App\Controller;

use Cake\Http\Exception\NotFoundException;

class UsersController extends AppController {

    public function initialize() {
        parent::initialize();
        //ajoute l'action 'add' de ce controller à la liste des actions autorisées sans être connecté
        $this->Auth->allow(['add']);
    }

    // affiche le contenu de la BDD
    public function index() {
        // $this représente l'app de manière générale
        // affichage des utilisateur classé par pseudo
        $u = $this->Users->find()->order('pseudo');
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
            $this->Flash->error('Try again');
        }

        //envoie la variable à la vue
        $this->set(compact('new'));
    }

    public function login() {
        if ($this->request->is('post')) {
            // essaye de matcher avec un utilisateur de la base
            $user = $this->Auth->identify();
            // si on trouve qu'un qui match
            if ($user) {
                // on le memorise en session
                $this->Auth->setUser($user);
                //on redirige vers la page d'avant
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Votre identifiant ou votre mot de passe est incorrect.');
        }
    }

    public function logout() {
        $this->Flash->success('A bientôt');
        // return $this->redirect($this->Auth->logout());
        $this->Auth->logout();
        return $this->redirect(['controller' => 'Movies', 'action' => 'index']);
    }
}
