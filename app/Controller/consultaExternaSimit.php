<?php
session_start();
require '../../vendor/autoload.php';
require '../Clases/GuardarConsultaExterna.php';
require '../Clases/buscarDatos.php';
//use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\DB;
//use App\entities\User;

if(!empty( $_SESSION['start'])){
    $consulta = new GuardarConsultaExterna();
    $consulta->setDocumento($_SESSION['start']['doc']);
    //print_r($_SESSION['start']['doc']);
    if($consulta->guardarDbSimit()){
        $datos =  new BuscarDatos();
        $simit = $datos -> buscarUsuarioSimit($_SESSION['start']['id']);
        if(!empty($simit)){
            echo json_encode($simit, JSON_FORCE_OBJECT);
        }else{
            $error = array(
                "error" => "406"
            );
            echo json_encode($error, JSON_FORCE_OBJECT);
        }
    }else{
        $datos =  new BuscarDatos();
        $simit = $datos -> buscarUsuarioSimit($_SESSION['start']['id']);
        echo json_encode($simit, JSON_FORCE_OBJECT);
    }
}else{
    header("Location: ../../index.php");
}