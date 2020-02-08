<?php
session_start();
require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./resource/views/');
$twig = new \Twig\Environment($loader);
if(!empty($_SESSION['start'])){
    echo $twig->render('app.php');
}else{
$data = file_get_contents("https://pkgstore.datahub.io/core/country-list/data_json/data/8c458f2d15d9f2119654b29ede6e45b8/data_json.json");
$paises = json_decode($data, true);

echo $twig->render('registrar.php', compact('paises'));
 }