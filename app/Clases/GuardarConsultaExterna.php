<?php
require '../../vendor/autoload.php';
require '../../config/database.php';
require 'CustomerData.php';
//use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\DB;
use App\entities\Sisben;
use App\entities\Simit;


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

   public function consultraSimit(){
    $datos = $this->datosexternos->consultraConductor($this->documento);
    return $datos;
   }
    
   public function guardarDbSisben(){
    if($this->buscarUsuarioSisben($_SESSION['start']['id'])){
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
      }else{
        return false;
      }
             
   } 

      public function guardarDbSimit(){

        if($this->buscarUsuarioSimit($_SESSION['start']['id'])){
          $simit =  new Simit();
          $datos = $this->consultraSimit();
          $datosimit = json_decode($datos, true);
          if(!empty($datosimit) && $datosimit != null){
          
          $simit->estado = $datosimit['data']['multa']['estadoPazSalvo'];
          $simit->numeropaz = $datosimit['data']['multa']['numeroPazSalvo'];
          $simit->numerocomparendos = $datosimit['data']['multa']['numeroComparendos'];
          $simit->suspencion = $datosimit['data']['multa']['estadoSuspension'];
          $simit->user_id = $_SESSION['start']['id'];
          $simit->save();
          return true;
          }else{
            return false;
          }
        }else{
          return false;
        }
        
              
    }

    public function buscarUsuarioSisben($id){
      $usuario = Sisben::where('user_id','=',$id)->first();
      $datos = json_decode($usuario, true);
      
      if(empty($datos)){
        
        return true;
      }else{
          return false;
      }
  }

  public function buscarUsuarioSimit($id){
    $usuario = Simit::where('user_id','=',$id)->first();
    $datos = json_decode($usuario, true);
    
    if(empty($datos)){
      
      return true;
    }else{
        return false;
    }
}


}