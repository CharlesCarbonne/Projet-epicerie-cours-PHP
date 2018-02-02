<?php
include 'includes/includes.php';
include 'includes/checkLogin.php';
$config = \Service\Configuration::getInstance();

if(isset($_GET['idProduit']) && is_numeric($_GET['idProduit'])){
   $pr = RepoFactory::createRepository('product');
    $productToUpdate = $pr->getById($_GET['idProduit']);

    if (!empty($_POST)) {
        $errors = [];
        $tr = RepoFactory::createRepository(RepoFactory::TYPE);

        if (isset($_POST['nomProduit']) && strlen($_POST['nomProduit']) > 3) {
            $productToUpdate->setNom($_POST['nomProduit']);
        } else {
            $errors['nomProduit'] = "Le nom du produit doit faire au moins 3 caractères";
        }

        if(isset($_POST['prixProduct']) && is_numeric($_POST['stockProduct']) && $_POST['stockProduct']>0){
            $productToUpdate->setPrix($_POST['prixProduct']);
        } else {
            $errors['prixProduit'] = "Le prix du produit doit être un nombre supérieur à 0";
        }

        if(isset($_POST['type'])){
            $productToUpdate->setType($tr->getById($_POST['type']));
        } else {
            $errors['typeProduit'] = "Vous devez choisir un type de produit";
        }

        if(isset($_POST['moisSemis'])){
            $productToUpdate->setMoisSemis($_POST['moisSemis']);
        } else {
            $errors['moisSemis'] = "Vous devez choisir un mois de semis";
        }

        if (isset($_POST['stockProduct']) && is_numeric($_POST['stockProduct']) && $_POST['stockProduct']>0){
            $productToUpdate->setStock($_POST['stockProduct']);
        }else {
            $errors['stockProduct'] = "Le stock doit etre un nombre supérieur à 0";
        }

        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0){
            if ($_FILES['avatar']['size'] <= 1000000){
                $infosfichier = pathinfo($_FILES['avatar']['name']);
                $extensionUpload = $infosfichier['extension'];
                $extensionsAutorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extensionUpload, $extensionsAutorisees)){
                    $filename = basename($_FILES['avatar']['name']);
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $config->getImagePath().$filename);
                    $productToUpdate->setAvatarName($filename);
                } else {
                    $errors['avatarFormat'] = "<br><strong>Erreur: </strong>L'extension de l'image doit etre jpg, jpeg, gif ou png";
                }
            } else {
                $errors['avatarSize'] = "<br><strong>Erreur: </strong>L'image doit avoir une taille de 1mo maximum";
            }
        }

        if (empty($errors)){
            $pr->update($productToUpdate);
            $id = $productToUpdate->getId();
            $header = 'Location: index.php?produitModif='.$productToUpdate->getId();
            header($header);
        }
    }
    include 'views/create.php';
}
