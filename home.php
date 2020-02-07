<?php
session_start();
require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./resource/views/');
$twig = new \Twig\Environment($loader);


    echo $twig->render('app.php');