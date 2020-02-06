<?php
session_start();
require '../../vendor/autoload.php';
require '../../config/database.php';
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$sesion = new Sesion();

if($sesion->buscarUsuario($request->get('email'),$request->get('password'))){
    
}