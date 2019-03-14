<?php //file : src/Templates/Quotes/vue.ctp ?>

<h1>Film</h1>
<p><?= $movie->title ?></p>
<p>
        <span class="label">Réalisateur :</span>
         <?=  (!empty($movie->director)) ? $movie->director : '<span style="font-style:italic;">Anonyme</span>' ?>
</p>
<p>
        <span class="label">Durée :</span>
        <?=  (!empty($movie->duration)) ? $movie->duration : ''; ?>
</p>
<p>
        <span class="label">Sortie :</span>
        <?=  (!empty($movie->releasedate)) ? $movie->releasedate : ''; ?>
</p>
<p>
        <span class="label">Résumé :</span>
        <?=  (!empty($movie->synopsis)) ? $movie->synopsis : ''; ?>
</p>
<p>
        <span class="label">Fiche créée le :</span>
        <?= $movie->created->i18nFormat('dd/MM/yyyy HH:mm:ss') ?>
</p>
<p>
        <span class="label">Fiche modifiée :</span>
        <?= $movie->modified->i18nFormat('dd/MM/yyyy HH:mm:ss') ?>
</p>
<p>id #<?= $movie->id ?></p>

<p><?= $this->HTML->link('Editer', ['action' => 'edit', $movie->id]) ?></p>
<?= $this->Form->postlink('Supprimer', ['action' => 'delete', $movie->id], ['confirm' => 'Etes-vous sûr de vouloir supprimer ce film ?']); ?>