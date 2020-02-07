<?php
require '../../vendor/autoload.php';
require '../../config/database.php';
require 'CustomerData.php';
//use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\DB;
use App\entities\Sisben;


class GuardarConsultaExterna{

   private $documento;
   private $datosexternos;

   function __construct() {
    $this->datosexternos =  new CustomerData();
   } 

   public function setDocumento($doc){
    
     $this->documento = $doc;

   }

   public function consultraSisben(){
       $datos = $this->datosexternos->consultarSisben($this->documento);
       return $datos;
   }

   public function consultraConductor(){
    $datos = $this->datosexternos->consultraConductor($this->documento);
    return $datos;
   }
    
   public function guardarDb(){
       $sisben =  new Sisben();
       $datos = $this->consultraSisben();
       $datosisben = json_decode($datos, true);
       if(!empty($datosisben) && $datosisben != null){
        
        $sisben->puntaje = $datosisben['data']['puntaje'];
        $sisben->departamento = $datosisben['data']['departamento'];
        $sisben->municipio = $datosisben['data']['municipio'];
        $sisben->codigomunicipio = $datosisben['data']['codigoMunicipio'];
        $sisben->fechaingreso = $datosisben['data']['fechaIngreso'];
        $sisben->user_id = $_SESSION['start']['id'];
        $sisben->save();
        return true;
       }else{
         return false;
       }
             
   } 


}