<?php //file : src/Templates/Movies/add.ctp ?>

<!-- Form est un helper comme Htlm-->
<?= $this->Form->create($new) ?>
    <h1>Ajouter un film</h1>
    <?= $this->Form->control('title', ['label' => 'Titre']) ?>
    <?= $this->Form->control('director', ['label' => 'Réalisateur']) ?>
    <!-- <?= $this->Form->control('poster') ?> -->
    <?= $this->Form->control('duration', ['label' => 'Durée (en minutes)']) ?>
    <?= $this->Form->control('releasedate', ['label' => 'Date de sortie']) ?>
    <?= $this->Form->control('synopsis', ['label' => 'Résumé']) ?>
    <?= $this->Form->button('Ajouter') ?>
<?= $this->Form->end() ?>