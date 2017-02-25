<?php

// Réinitialisation de la partie, simplement en vidant la session

session_start();
$_SESSION = array();
header('location:index.php');
