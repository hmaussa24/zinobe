<?php
session_start();
require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./resource/views/');
$twig = new \Twig\Environment($loader);
if(!empty($_SESSION['error'])){
    echo $twig->render('home.php', ['error' => '401']);
}else{ 
    echo $twig->render('home.php');
}