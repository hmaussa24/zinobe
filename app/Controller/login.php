<?php

require '../../vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
$request = Request::createFromGlobals();


echo $request->get('email');
?>