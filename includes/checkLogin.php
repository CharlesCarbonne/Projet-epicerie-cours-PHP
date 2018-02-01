<?php
session_start();
$us = new \Service\UserService($usersList);
if (!$us->isUserConnected()) {
    header('Location: login.php');
}