<?php
$fruit = new \Entity\Type();
$fruit->setNom('Fruit');
$legume = new \Entity\Type();
$legume->setNom('Legume');

$typeTest1 = new \Entity\Type();
$typeTest1->setNom('TypeTest1');
$typeTest2 = new \Entity\Type();
$typeTest2->setNom('TypeTest2');

$pomme = new \Entity\Product('Pomme', '3,5', $fruit, 2, 4);
$courgette = new \Entity\Product('Courgette', '3', $legume, 4, 10);
$carotte = new \Entity\Product('Carotte', '2', $legume, 3, 0);

$produits = [
    0 => $pomme,
    1 => $courgette,
    2 => $carotte,
];

$types = [$fruit, $legume, $typeTest1, $typeTest2];

