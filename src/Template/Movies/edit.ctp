<?php //file : src/Templates/Movies/edit.ctp ?>

<!-- Form est un helper comme Htlm-->
<?= $this->Form->create($movie) ?>
    <h1>Modifier un film</h1>
    <?= $this->Form->control('title', ['label' => 'Titre']) ?>
    <?= $this->Form->control('director', ['label' => 'Réalisateur']) ?>
    <!-- <?= $this->Form->control('poster') ?> -->
    <?= $this->Form->control('duration', ['label' => 'Durée (en minutes)']) ?>
    <div class="input date">
        <label>Date de sortie</label>
        <?= $this->Form->text('releasedate', ['label' => 'Date de sortie', 'type' => 'date', 'value'=> (!empty($movie->releasedate)) ? $movie->releasedate->i18nFormat('yyyy-MM-dd') : '']) ?>
    </div>
    <?= $this->Form->control('synopsis', ['label' => 'Résumé']) ?>
    <?= $this->Form->button('Editer') ?>
<?= $this->Form->end() ?>