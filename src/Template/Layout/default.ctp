<?php
$cakeDescription = 'Gestionnaire de films';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?= $this->fetch('title') ?> - 
        <?= $cakeDescription ?>:
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('reset.css') ?>
    <?= $this->Html->css('main.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <h1><?= $this->Html->link('Movies !', ['controller' => 'movies', 'action' => 'index']) ?></h1>
        <nav>
            <?= $this->Html->link('Liste des films', ['controller' => 'movies', 'action' => 'index'], [ 'class' => ($this->templatePath === 'Movies' && $this->template === 'index') ? 'active' : '']) ?>
            <?= $this->Html->link('Ajouter un film', ['controller' => 'movies', 'action' => 'add'], [ 'class' => ($this->templatePath === 'Movies' && $this->template === 'add') ? 'active' : '']) ?>
            <?= $this->Html->link('Afficher aléatoirement un film', ['controller' => 'movies', 'action' => 'random'], [ 'class' => ($this->templatePath === 'Movies' && $this->template === 'view') ? 'active' : '']) ?>
            <?= $this->Html->link('Liste des utilisateurs', ['controller' => 'users', 'action' => 'index'], [ 'class' => ($this->templatePath === 'Users' && $this->template === 'index') ? 'active' : '']) ?>
            <?= $this->Html->link('Se connecter', ['controller' => 'users', 'action' => 'login'], [ 'class' => ($this->templatePath === 'Users' && $this->template === 'login') ? 'active' : '']) ?>
            <?= $this->Html->link('Créer un compte utilisateur', ['controller' => 'users', 'action' => 'add'], [ 'class' => ($this->templatePath === 'Users' && $this->template === 'add') ? 'active' : '']) ?>
        </nav>
    </header>
    <main>
        <!-- <?= var_dump($this->request->params['action']) ?> -->
        <!-- Affiche les messages pour l'utilisateur (et les vides de la mémoire) -->
        <?= $this->Flash->render() ?>
        <!-- affiche le contenu de cette page -->
        <?= $this->fetch('content') ?>
    </main>
    
    <footer>
    </footer>
</body>
</html>
