<?php
session_start();
require '../../vendor/autoload.php';
require '../Clases/GuardarConsultaExterna.php';
//use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\DB;
//use App\entities\User;

if(!empty( $_SESSION['start'])){
    $consulta = new GuardarConsultaExterna();
    $consulta->setDocumento($_SESSION['start']['doc']);
    //print_r($_SESSION['start']['doc']);
    if($consulta->guardarDb()){

    }else{
        
    }
}else{
    header("Location: ../../index.php");
}