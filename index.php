<?php
include 'includes/includes.php';
include 'includes/checkLogin.php';

$us = new \Service\UserService($usersList);
$ps = new \Service\ProductService();

$productsToDisplay = [];

if (isset($_GET['type'])) {
    $nomType = $_GET['type'];
    if ($nomType == 'Legume') {
        $productsToDisplay = getLegumes($produits);
    } elseif ($nomType == 'Fruit') {
        $productsToDisplay = getFruits($produits);
    }
} else $productsToDisplay = $produits;

if (isset($_POST['search']) && $_POST['search'] != null){
        $search = $_POST['search'];
        $productsToDisplay = getProductFromNom($search, $produits);
}

include 'views/index.php';
