<?php
include 'includes/includes.php';
session_start();
$us = new \Service\UserService($usersList);
$us->logout();
header('Location: index.php');
