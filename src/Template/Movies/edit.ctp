<?php //file : src/Templates/Movies/edit.ctp ?>

<!-- Form est un helper comme Htlm-->
<?= $this->Form->create($movie) ?>
    <h1>Modifier un film</h1>
    <?= $this->Form->control('title', ['label' => 'Titre']) ?>
    <?= $this->Form->control('director', ['label' => 'Réalisateur']) ?>
    <!-- <?= $this->Form->control('poster') ?> -->
    <?= $this->Form->control('duration', ['label' => 'Durée (en minutes)']) ?>
    <?= $this->Form->control('releasedate', ['label' => 'Date de sortie']) ?>
    <?= $this->Form->control('synopsis', ['label' => 'Résumé']) ?>
    <?= $this->Form->button('Editer') ?>
<?= $this->Form->end() ?>