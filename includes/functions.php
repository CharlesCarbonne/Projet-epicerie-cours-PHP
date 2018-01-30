<?php
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