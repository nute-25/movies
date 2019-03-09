<?php //file : src/Templates/Movies/index.ctp 
// echo '<pre>';
// var_dump($m, count($m));
// echo '</pre>';
?>

<p>Il y a <?= $m->count() ?> film(s)</p>
<!-- part 1 : on redirige vers un form -->
<p><?= $this->HTML->link('Ajouter un film', ['action' => 'add']) ?></p>

<table>
    <tr>
        <th>Titre</th>
        <th>Réalisateur</th>
        <th>Sortie</th>
    </tr>
    <?php foreach($m as $uneLigne) : ?>
        <tr>
            <td><?= $this->Html->link($uneLigne->title, ['action' => 'view', $uneLigne->id]) ?></td>
            <td><?= $uneLigne->director ?></td>
            <td><?= (!empty($uneLigne->releasedate)) ? $uneLigne->releasedate->i18nFormat('dd/MM/yyyy') : '' ?></td>
        </tr>
    <?php endforeach; ?>
</table>