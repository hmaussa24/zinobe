<?php

require '../Clases/Registrar.php';
use Symfony\Component\HttpFoundation\Request;
$registrar = new Registrar();
$request = Request::createFromGlobals();
$registrar->registrarUsuario($request);
?>