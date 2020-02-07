<?php
session_start();
require '../../vendor/autoload.php';
require '../Clases/Sesion.php';
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$sesion = new Sesion();

if($sesion->buscarUsuario($request->get('email'),$request->get('password'))){
    header("Location: ../../home.php");
    //echo "si";
}else{
    $_SESSION['error'] = true;
    //echo "no";
     header("Location: ../../index.php");
}