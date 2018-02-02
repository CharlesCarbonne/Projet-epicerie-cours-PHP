<?php
include 'includes/includes.php';
include 'includes/checkLogin.php';

$us = new \Service\UserService($usersList);
$ps = new \Service\ProductService();
$tr = RepoFactory::createRepository('type');
$pr = RepoFactory::createRepository('product');



$productsToDisplay = [];

if (isset($_GET['type'])) {
    $idType = $_GET['type'];
    $productsToDisplay = $pr->getAllByTypeId($idType);
} else $productsToDisplay = $produits;

if (isset($_POST['search']) && $_POST['search'] != null){
        $search = $_POST['search'];
        $productsToDisplay = $ps->getProductFromNom($search, $produits);
}

include 'views/index.php';
