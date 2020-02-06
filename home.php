<?php
session_start();
require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./resource/view/');
$twig = new \Twig\Environment($loader);

if(isset($_SESSION['error'])){
    echo $twig->render('index.php',['error' => 'error']);
}

echo $twig->render('home.php');