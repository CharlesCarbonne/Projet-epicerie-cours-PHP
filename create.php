<?php
include 'includes/includes.php';
include 'includes/checkLogin.php';
$config = \Service\Configuration::getInstance();

if (!empty($_POST)) {
    $errors = [];
    $produitCree = new \Entity\Product();
    $tr = RepoFactory::createRepository('type');
    $pr = RepoFactory::createRepository('product');

    if (isset($_POST['nomProduit']) && strlen($_POST['nomProduit']) > 3) {
        $produitCree->setNom($_POST['nomProduit']);
    } else {
        $errors['nomProduit'] = "<strong>Erreur: </strong>Le nom du produit doit faire au moins 3 caractères";
    }


    if(isset($_POST['prixProduct']) && is_numeric($_POST['stockProduct']) && $_POST['stockProduct']>0){
        $produitCree->setPrix($_POST['prixProduct']);
    } else {
        $errors['prixProduit'] = "<br><strong>Erreur: </strong>Le prix du produit doit être un nombre supérieur à 0";
    }

    if(isset($_POST['type'])){
        $produitCree->setType($tr->getById($_POST['type']));
    } else {
        $errors['typeProduit'] = "<br><strong>Erreur: </strong>Vous devez choisir un type de produit";
    }

    if(isset($_POST['moisSemis'])){
        $produitCree->setMoisSemis($_POST['moisSemis']);
    } else {
        $errors['moisSemis'] = "<br><strong>Erreur: </strong>Vous devez choisir un mois de semis";
    }

    if (isset($_POST['stockProduct']) && is_numeric($_POST['stockProduct']) && $_POST['stockProduct']>0){
        $produitCree->setStock($_POST['stockProduct']);
    }else {
        $errors['stockProduct'] = "<br><strong>Erreur: </strong>Le stock doit etre un nombre supérieur à 0";
    }

    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0){
        if ($_FILES['avatar']['size'] <= 1000000){
            $infosfichier = pathinfo($_FILES['avatar']['name']);
            $extensionUpload = $infosfichier['extension'];
            $extensionsAutorisees = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extensionUpload, $extensionsAutorisees)){
                $filename = basename($_FILES['avatar']['name']);
                move_uploaded_file($_FILES['avatar']['tmp_name'], $config->getImagePath().$filename);
                $produitCree->setAvatarName($filename);
            } else {
                $errors['avatarFormat'] = "<br><strong>Erreur: </strong>L'extension de l'image doit etre jpg, jpeg, gif ou png";
            }
        } else {
            $errors['avatarSize'] = "<br><strong>Erreur: </strong>L'image doit avoir une taille de 1mo maximum";
        }
    }

    if (empty($errors)){
        $produitCree->setId($pr->create($produitCree));
        $header = 'Location: index.php?produitModif='.$produitCree->getId();
        header($header);
    }
}

include 'views/create.php';
