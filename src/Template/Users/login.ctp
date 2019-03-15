<?php //file : src/Templates/Users/login.ctp ?>

<!-- Form est un helper comme Htlm-->
<?= $this->Form->create() ?>
    <h1>Se connecter</h1>
    <?= $this->Form->control('pseudo', ['label' => 'Pseudo']) ?>
    <?= $this->Form->control('password', ['label' => 'Password']) ?>
    <?= $this->Form->button('Se connecter') ?>
<?= $this->Form->end() ?>