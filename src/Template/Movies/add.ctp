<?php //file : src/Templates/Movies/add.ctp ?>

<!-- Form est un helper comme Htlm-->
<?= $this->Form->create($new, ['enctype' => 'multipart/form-data']) ?>
    <h1>Ajouter un film</h1>
    <?= $this->Form->control('title', ['label' => 'Titre']) ?>
    <?= $this->Form->control('director', ['label' => 'Réalisateur']) ?>
    <?= $this->Form->control('poster', ['type' => 'file', 'label' => 'Affiche']) ?>
    <?= $this->Form->control('duration', ['label' => 'Durée (en minutes)']) ?>
    <div class="input date">
        <label>Date de sortie</label>
        <?= $this->Form->text('releasedate', ['label' => 'Date de sortie', 'type' => 'date']) ?>
    </div>
    <?= $this->Form->control('synopsis', ['label' => 'Résumé']) ?>
    <?= $this->Form->button('Ajouter') ?>
<?= $this->Form->end() ?>