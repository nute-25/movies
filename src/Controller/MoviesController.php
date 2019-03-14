<?php
// src/Controller/MoviesController.php

// espace logique auquel appartient le controller
namespace App\Controller;

use Cake\Http\Exception\NotFoundException;

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

            // si le fichier correspond à l'un des types autorisés
            if(in_array($this->request->data['poster']['type'], array('image/png', 'image/jpg', 'image/jpeg', 'image/gif'))) {
                
                // recupere l'extension qui était utilisée
                $ext = pathinfo($this->request->getData('poster')['name'], PATHINFO_EXTENSION);
                // création du nouveau nom
                $name = 'a-'.rand(0,3000).'-'.time().'.'.$ext;

                // reconstitution du chemin global du fichier
                $adress = WWW_ROOT.'/data/posters/'.$name;

                // valeur a enregistrer dans la base
                $new->poster = $name;

                // on le deplace de la mémoire temporaire vers l'emplacement souhaité
                move_uploaded_file($this->request->getData('poster')['tmp_name'], $adress);

            } else {
                $new->poster = null;
                $this->Flash->error('Ce format de fichier n\'est pas autorisé');
            }

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


    public function edit($id) {
        $movie = $this->Movies->get($id);

        // on autorise la methode put pour la modification
        if ($this->request->is(['post', 'put'])) {
            // en ne stockant pas le patchEntity dans une variable, il redonne seulement les champs qui ont été modifiés
            $this->Movies->patchEntity($movie, $this->request->getData());
            if($this->Movies->save($movie)) {
                $this->Flash->success('Ok');

                // redirige vers la page de cette citation
                return $this->redirect(['action' => 'view', $movie->id]);
            }
            $this->Flash->error('Modif plantée');
        }

        //envoie la variable à la vue
        $this->set(compact('movie'));
    }


    /* public function delete($id) {
        $this->request->allowMethod(['post', 'delete']);

        // on récupère l'élément ciblé
        $movie = $this->Movies->get($id);

        if($this->Movies->delete($movie)) {
            $this->Flash->success('Supprimé');
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error('Suppression plantée');
            // redirige vers la page de cette citation
            return $this->redirect(['action' => 'view', $id]);
        }
    }  */

    // ici on peut choisir/configuer notre msg d'erreur
    public function delete($id) {

        // si on est en post ou en delete, on fait l'action
        if ($this->request->is(['post', 'delete'])) {
            // on récupère l'élément ciblé
            $movie = $this->Movies->get($id);

            if($this->Movies->delete($movie)) {
                $this->Flash->success('Supprimé');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Suppression plantée');
                // redirige vers la page de cette citation
                return $this->redirect(['action' => 'view', $id]);
            }
        } else { // sinon on déclenche une erreur 400 parsonnalisée
            throw new NotFoundException('Méthide interdite (c\'est pas beau de tricher)');
        }
        
    } 


    public function random() {
        //selectionne l'ensemble des données de la table movies et les range par ordre aléatoire, puis sélectionne le premier élément de la liste
        $random = $this->Movies->find('all')->order('rand()')->limit(1)->first();
        $id = $random->id;

        // redirige vers la vue qui va bien
        return $this->redirect(['action' => 'view', $id]);
    }
}
