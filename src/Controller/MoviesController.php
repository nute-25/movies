<?php
// src/Controller/MoviesController.php

// espace logique auquel appartient le controller
namespace App\Controller;

class MoviesController extends AppController {

    public function hello() {

    }

    // en général index() affiche le contenu de la BDD
    public function index() {
        // $this représente l'app de manière générale
        // on récupère ce qu'on a dans la BDD
        $m = $this->Movies->find();
        // on transmet le contenu stocké dans $q à la view
        $this->set(compact('m'));
    }

    public function view($id) {
        // recupère l'élement qui a l'id cherché
        $one = $this->Movies->get($id);

        // cree la variable $citation pour la vue (elle contiendra la valeur de $one)
        $this->set('movie', $one);
    }

    
    public function add() {
        // on créé une entité vide
        $new = $this->Movies->newEntity();

        // si on arrive sur cette action en methode POST
        if ($this->request->is('post')) {
            // patchEntity recupére les données saisies par l'user dans le form et de l'envoyer vers l'objet Movies puis la BDD
            //on met les données de l'utilisateur dans l'objet $new
            $new = $this->Movies->patchEntity($new, $this->request->getData());
            // si la sauvegarde fonctionne, on confirme et on redirige vers la liste globale des citations
            if($this->Movies->save($new)) {
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

    /*
    public function edit($id) {
        $citation = $this->Movies->get($id);

        // on autorise la methode put pour la modification
        if ($this->request->is(['post', 'put'])) {
            // en ne stockant pas le patchEntity dans une variable, il redonne seulement les champs qui ont été modifiés
            $this->Movies->patchEntity($citation, $this->request->getData());
            if($this->Movies->save($citation)) {
                $this->Flash->success('Ok');

                // redirige vers la page de cette citation
                return $this->redirect(['action' => 'view', $citation->id]);
            }
            $this->Flash->error('Modif plantée');
        }

        //envoie la variable à la vue
        $this->set(compact('citation'));
    }

    public function delete($id) {
        $this->request->allowMethod(['post', 'delete']);

        // on récupère l'élément ciblé
        $quote = $this->Movies->get($id);

        if($this->Movies->delete($quote)) {
            $this->Flash->success('Supprimé');
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error('Suppression plantée');
            // redirige vers la page de cette citation
            return $this->redirect(['action' => 'view', $id]);
        }
    } */
}
