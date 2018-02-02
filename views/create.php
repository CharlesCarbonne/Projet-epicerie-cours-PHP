<?php

include __DIR__ . '/partials/header.php'; ?>

    <div>
        <h1>Create!</h1>
    </div>

    <div>
        <?php
        if (!empty($errors)) {
            echo('<div class="alert alert-danger">');
            foreach ($errors as $error) {
                echo($error);
            }
            echo('</div>');
        }
        ?>

    </div>

    <form method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col-md-3 offset-2">
                <input type="text" class="form-control" placeholder="Nom du produit" name="nomProduit"
                       value="<?php if (isset($productToUpdate)) {
                           echo($productToUpdate->getNom());
                       } ?>">
            </div>
            <div class="col-md-3">
                <select class="form-control" name="type">
                    <option
                    <?php if (!isset($productToUpdate)) {
                        echo("selected disabled>Type");
                    } else {
                        echo('value="' . $productToUpdate->getType()->getId() . '"selected>' . $productToUpdate->getType()->getNomType());
                    }
                    ?></option>
                    <?php
                    foreach ($types as $type):
                        $idType = $type->getId();
                        $nomType = $type->getNomType();
                        ?>
                        <option value="<?= $idType ?>"><?= $nomType ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Nombre en stock" name="stockProduct"
                       value="<?php if (isset($productToUpdate)) {
                           echo($productToUpdate->getStock());
                       } ?>">
            </div>
        </div>
        <br>

        <div class="form-row">
            <div class="col-md-3 offset-2">
                <input type="text" class="form-control" placeholder="Prix" name="prixProduct"
                       value="<?php if (isset($productToUpdate)) {
                           echo($productToUpdate->getPrix());
                       } ?>">
            </div>
            <div class="col-md-3">
                <select class="form-control" name="moisSemis">
                    <option
                    <?php if (!isset($productToUpdate)) {
                        echo("selected disabled>Mois Semis");
                    } else {
                        echo('value="' . $productToUpdate->getMoisSemis() . '"selected>' . $productToUpdate->getMoisSemis());
                    }
                    ?></option> <?php
                    $i = 0;
                    for ($i = 1; $i <= 12; $i++) { ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-3">
                <input type="file" name="avatar">
            </div>

        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


<?php include __DIR__ . '/partials/footer.php'; ?>