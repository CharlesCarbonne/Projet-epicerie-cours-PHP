<?php

include __DIR__.'/partials/header.php'; ?>

<div>
    <h1>Delete!</h1>
</div>

<form class="form-horizontal" action="delete.php" method="post">
    <input type="hidden" name="id" value="<?php echo $productToDelete->getId();?>"/>
    Etes vous sur de vouloir supprimer <?= $productToDelete->getNom()?>?

    <br />
    <div class="form-actions">
        <button type="submit" class="btn btn-danger">Yes</button>
        <a class="btn" href="index.php">No</a>
    </div>
</form>


<?php include __DIR__.'/partials/footer.php'; ?>
