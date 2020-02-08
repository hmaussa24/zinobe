<?php
session_start();
require_once 'vendor/autoload.php';
require 'app/Clases/BuscarUser.php';
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
$loader = new \Twig\Loader\FilesystemLoader('./resource/views/');
$twig = new \Twig\Environment($loader);

if(!empty($_SESSION['start'])){
    
    if(!empty($request->get('buscar'))){
            $datos = new  BuscarUser();
            $usuario = $datos->buscarUsuario($request->get('buscar'));
            $user = json_decode($usuario, true);
            if(!empty($user)){
                echo $twig->render('app.php',compact('user'));
            }else{
                echo $twig->render('app.php',['erroru' => '405']); 
            }

            

    }else{
        echo $twig->render('app.php');
    }
    
}else{ 
    echo $twig->render('home.php');
}