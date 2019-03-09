<?php //file : src/Templates/Quotes/vue.ctp ?>

<h1>Film</h1>
<p><?= $movie->title ?></p>
<p>Réalisateur : <?=  (!empty($movie->director)) ? $movie->director : '<span style="font-style:italic;">Anonyme</span>' ?></p>
<?=  (!empty($movie->duration)) ? '<p>Durée : '.$movie->duration.'</p>' : '';
        (!empty($movie->releasedate)) ? '<p>Durée : '.$movie->releasedate.'</p>' : '';
        (!empty($movie->synopsis)) ? '<p>Durée : '.$movie->synopsis.'</p>' : '' ?>
<p>Créée le : <?= $movie->created ?></p>
<p>Modifiée : <?= $movie->modified ?></p>
<p>id #<?= $movie->id ?></p>

<p><?= $this->HTML->link('Editer', ['action' => 'edit', $movie->id]) ?></p>
<?= $this->Form->postlink('Supprimer', ['action' => 'delete', $movie->id], ['confirm' => 'Etes-vous sûr de vouloir supprimer ce film ?']); ?>