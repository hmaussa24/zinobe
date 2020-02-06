<?php

require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./resource/views/');
$twig = new \Twig\Environment($loader);

echo $twig->render('home.php', ['name' => 'Fabien']);