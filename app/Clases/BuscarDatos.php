<?php
require '../../vendor/autoload.php';
require '../../config/database.php';
use Illuminate\Support\Facades\DB;
use App\entities\Sisben;
use App\entities\Simit;
use App\entities\User;
class BuscarDatos{



    public function buscarUsuarioSisben($id){
        $usuario = Sisben::where('user_id','=',$id)->first();
        $datos = json_decode($usuario, true);
        if(!empty($datos)){
            return $datos;
        }else{
            return false;
        }
    }
    public function buscarUsuarioSimit($id){
        $usuario = Simit::where('user_id','=',$id)->first();
        $datos = json_decode($usuario, true);
        if(!empty($datos)){
            return $datos;
        }else{
            return false;
        }
    }

    public function buscarUsuario($datos){
        $users = User::where('doc','=', $datos)->first();

        return $users;
    }



}