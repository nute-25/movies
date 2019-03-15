<?php //file : src/Templates/Movies/editImage.ctp ?>

<!-- Form est un helper comme Htlm-->
<?= $this->Form->create($movie, ['enctype' => 'multipart/form-data']) ?>
    <h1>Modification de l'affiche de : <?= $movie->title ?></h1>
    <?= $this->Form->control('poster', ['type' => 'file', 'label' => 'Affiche']) ?>
    <figure>
        <?php 
        // si on a l'image, on l'affiche; sinon, on met une image par défaut
        if (!empty($movie->poster)) { ?>
                <?= $this->HTML->image('../data/posters/'.$movie->poster, ['alt' => 'affiche de : '.$movie->title]) ?>
        <?php } else { ?>
                <!-- default.jpg se trouve dans webroot/img -->
                <?= $this->HTML->image('default.jpg', ['alt' => 'Visuel non disponible' ]) ?>
        <?php } ?>
        <figcaption>Image actuelle</figcaption>
    </figure>
    <?= $this->Form->button('Editer') ?>
<?= $this->Form->end() ?>