<?php //file : src/Templates/Quotes/vue.ctp 
var_dump($movie); ?>


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
<figure>
        <?php 
        // si on a l'image, on l'affiche; sinon, on met une image par défaut
        if (!empty($movie->poster)) { ?>
                <?= $this->HTML->image('../data/posters/'.$movie->poster, ['alt' => 'affiche de : '.$movie->title]) ?>
        <?php } else { ?>
                <!-- default.jpg se trouve dans webroot/img -->
                <?= $this->HTML->image('default.jpg', ['alt' => 'Visuel non disponible' ]) ?>
        <?php } ?>
        <figcaption>
                Affiche de 
                <?= $movie->title ?>
                <p>
                        <?= $this->HTML->link('Modifier l\'affiche', ['action' => 'editImage', $movie->id]) ?>
                </p>
                <?php if (!empty($movie->poster)) { 
                        echo $this->Form->postLink('Supprimer l\'affiche', ['action' => 'deleteImage', $movie->id], ['confirm' => 'Etes-vous sûr de vouloir supprimer cette affiche ?']);
                } ?>
        
        </figcaption>
</figure>

<p><?= $this->HTML->link('Editer', ['action' => 'edit', $movie->id]) ?></p>
<p><?= $this->HTML->link('Modifier l\'affiche', ['action' => 'editImage', $movie->id]) ?></p>
<?= $this->Form->postLink('Supprimer', ['action' => 'delete', $movie->id], ['confirm' => 'Etes-vous sûr de vouloir supprimer ce film ?']); ?>

<h2>Notation générale</h2>
<?php echo $query->moyenne ?>

<h2>Commentaire(s)</h2>
<?php if(empty($movie->comments))
        echo '<p>Il n\'y a pas de commentaire sur ce film</p>';
else foreach($movie->comments as $key => $value) { ?>
        <article>
                <p class="infos"><?= $value->user->pseudo ?>
                , <?= $value->created->i18nFormat('dd/MM/yyyy HH:mm:ss') ?> : <?= $value->grade ?></p>
                <p><?= $value->content ?></p>
        </article>
<?php } ?>



<?php   // si l'utilisateur est connecté
        if($auth->user()) {?>
                <h2>Ajouter un commentaire</h2>
                <?php /* pour creer le formulaire, on a besoin de :
                        - l'entitié vide ($comment)
                        - de lui dire sur quelle action aller pour traiter les données (puisque ce n'est pas le même fichier). 
                        Ici ce sera l'action add du controller comments */
                ?>
                <?= $this->Form->create($comment, ['url' => '/comments/add']) ?>
                        <?php 
                                echo $this->Form->control('content'); 
                                echo $this->Form->hidden('movie_id', ['value' => $movie->id]);
                                echo $this->Form->control('grade'); 
                        ?>
                        <?= $this->Form->button('Ajouter'); ?>
                <?= $this->Form->end() ?>
        <?php }
        else { ?>
              <p>Vous devez être connecté pour pouvoir commenter : <?= $this->HTML->link('se connecter', ['controller' => 'users', 'action' => 'login']) ?></p>
        <?php } ?>