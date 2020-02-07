<?php
session_start();
require '../../vendor/autoload.php';
require '../../config/database.php';
use Illuminate\Support\Facades\DB;
use App\entities\User;
class Sesion{


    public function validarUser(User $usuario, $mail, $pwd){
            
            $datos = json_decode($usuario, true);
        
              //print_r( $paises['email']);

            if($datos['email'] == $mail && $datos['password'] == $pwd){
                //echo $usuario->get('email');
                return true;
            }else{
                return false;
            }
    }

    public function buscarUsuario($mail,$pwd){
        $usuario = User::where('email','=',$mail)->first();
        
        if($usuario){
            if($this->validarUser($usuario,$mail,$pwd)){
                $_SESSION['start'] = json_decode($usuario, true);
                
                return true;
            }else{
                
                return false;
            }
        }else{
            return false;
        }
    }
}