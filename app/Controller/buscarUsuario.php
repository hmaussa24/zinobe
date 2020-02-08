<?php
session_start();
require '../../vendor/autoload.php';
require '../Clases/BuscarDatos.php';
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
if(!empty($_SESSION['start'])){

    $datos = new  BuscarDatos();
    $usuario = $datos->buscarUsuario($request->get('buscar'));
    if(!empty($usuario)){
        $loader = new \Twig\Loader\FilesystemLoader('../../resource/views/');
        $twig = new \Twig\Environment($loader);

            echo $twig->render('app.php');

    }

}else{
    header("Location: ../../");
}