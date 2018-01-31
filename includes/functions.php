<?php
use Entity\Product;

function getStock($stock){
    if($stock >= 5){
        return "produit en stock";
    }
    elseif($stock >0 && $stock<5){
        return "bientot plus de stock";
    }
    elseif($stock ==0){
        return "en attente de livraison";
    }


}

function getSaison($mois_semis){

    if($mois_semis <=3){
        return "hiver";
    }
    elseif($mois_semis>3 && $mois_semis<=6){
        return "printemps";
    }
    elseif($mois_semis > 6 && $mois_semis<=9){
        return "été";
    }
    elseif($mois_semis>9){
        return "automne";
    }

}

function getFruits($produits){
    $fruits = [];
    foreach ($produits as $produit){
        if ($produit->getType()->getNomType() == 'Fruit'){
            $fruits[] = $produit;
        }
    }
    return $fruits;
}

function getLegumes($produits){
    $legumes = [];
    foreach ($produits as $produit){
        if ($produit->getType()->getNomType() == 'Legume'){
            $legumes[] = $produit;
        }
    }
    return $legumes;
}

function getProductFromNom($search, $produits){
    $produitsFromNom = [];
    foreach ($produits as $produit){
        if (stripos($produit->getNom(), $search) !== false){
            $produitsFromNom[] = $produit;
        }
    }
    return $produitsFromNom;
}