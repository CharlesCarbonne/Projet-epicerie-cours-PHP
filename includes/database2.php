<?php
$fruit = new \Entity\Type();
$fruit->setId('1')->setNom('Fruit');
$legume = new \Entity\Type();
$legume->setId('2')->setNom('Legume');

$boulangerie = new \Entity\Type();
$boulangerie->setId('3')->setNom('Boulangerie');

$pomme = new \Entity\Product('Pomme', '3,5', $fruit, 2, 4);
$courgette = new \Entity\Product('Courgette', '3', $legume, 4, 10);
$carotte = new \Entity\Product('Carotte', '2', $legume, 3, 0);

$produits = [
    0 => $pomme,
    1 => $courgette,
    2 => $carotte,
];

$tr = new TypeRepository();
$types = $tr->getAll();

$toto = new \Entity\User();
$toto->setLogin('toto')->setPassword('titi');

$usersList = [$toto];
