<?php
//use Entity\Product;
include __DIR__ . '/partials/header.php';?>

<div>
    <h1>Index!</h1>
    <div>
    </div>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>Type</th>
            <th>Mois Semis</th>
            <th>Stock</th>
        </tr>
        </thead>
        <tbody>

        <?php
         /**
             * @var Entity\Product $produit
             */
        foreach ($productsToDisplay as $produit):
            ?>
            <tr>
                <td><?= $produit->getNom(); ?></td>
                <td><?= $produit->getPrix();?></td>
                <td><?= $produit->getType()->getNomType(); ?></td>
                <td><?= $ps->getSaison($produit->getMoisSemis()); ?></td>
                <td><?= $ps->getStock($produit->getStock()); ?></td>
            </tr>
            <?php
        endforeach
        ?>
        </tbody>
    </table>

<?php include __DIR__ . '/partials/footer.php'; ?>
