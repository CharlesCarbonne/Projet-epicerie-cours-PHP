<?php
include 'includes/includes.php';
include 'includes/checkLogin.php';


if(isset($_GET['idProduit']) && is_numeric($_GET['idProduit'])) {
    $pr = RepoFactory::createRepository('product');
    $productToDelete = $pr->getById($_GET['idProduit']);
    $pr ->delete($productToDelete);
include 'views/delete.php';
}else header('Location: index.php');
