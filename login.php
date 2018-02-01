<?php
include 'includes/includes.php';
session_start();
$us = new \Service\UserService($usersList);

if(isset($_POST['login']) && isset($_POST['password'])){

    $isAuthentified = $us->login($_POST['login'], $_POST['password']);
    if($isAuthentified === true){
        header('Location: index.php');
    }
    else echo('Login ou Password incorrect');
}

include 'views/login.php';


