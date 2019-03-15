<?php //file : src/Templates/Users/add.ctp ?>

<!-- Form est un helper comme Htlm-->
<?= $this->Form->create($new) ?>
    <h1>Ajouter un utilisateur</h1>
    <?= $this->Form->control('pseudo', ['label' => 'Pseudo']) ?>
    <?= $this->Form->control('password', ['label' => 'Password']) ?>
    <?= $this->Form->button('Ajouter') ?>
<?= $this->Form->end() ?>