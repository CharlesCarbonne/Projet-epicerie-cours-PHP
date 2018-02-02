<?php
//use Entity\Product;
include __DIR__ . '/partials/header.php'; ?>
<div>
    <h1>Index!</h1>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Avatar</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Type</th>
            <th>Mois Semis</th>
            <th>Stock</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php
        /**
         * @var Entity\Product $produit
         */
        foreach ($productsToDisplay as $produit):
            ?>
            <?php if (isset($_GET['produitModif'])){
            $produitModif = $_GET['produitModif'];
            if($produit->getId() == $produitModif){
                echo('<tr class="table-success">');
            } else echo ('<tr>');
        }?>

            <?php

             if ($produit->getAvatarName() !== NULL){
                echo('<td><image class = "avatar" src="uploads/'.$produit->getAvatarName().'"></image></td>');
             } else echo('<td></td>')
            ?>
            <td><?= $produit->getNom(); ?></td>
            <td><?= $produit->getPrix(); ?></td>
            <td><?= $produit->getType()->getNomType(); ?></td>
            <td><?= $ps->getSaison($produit->getMoisSemis()); ?></td>
            <td><?= $ps->getStock($produit->getStock()); ?></td>
            <td><a href="update.php?idProduit=<?= $produit->getId() ?>">Modifier</a></td>
            <td><a href="delete.php?idProduit=<?= $produit->getId() ?>">Supprimer</a></td>
            </tr>
            <?php
        endforeach
        ?>
        </tbody>
    </table>
    <?php include __DIR__ . '/partials/footer.php'; ?>
