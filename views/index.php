<?php

include __DIR__ . '/partials/header.php'; ?>

<div>
    <h1>Index!</h1>
    <div class="table">
    <table class="d-inline-block">
        <thead>
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
        foreach ($produits as $produit): ?>
            <tr>
                <td><?php echo $produit['nom']; ?></td>
                <td><?= $produit['prix'] ?></td>
                <td><?= $produit['type'] ?></td>
                <td><?= getSaison($produit['mois_semis']) ?></td>
                <td><?= getStock($produit['stock']) ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>
