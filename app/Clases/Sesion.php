<?php
session_start();
require '../../vendor/autoload.php';
require '../../config/database.php';
use Illuminate\Support\Facades\DB;
use App\entities\User;
class Sesion{


    public function validarUser(User $usuario, $mail, $pwd){
            if($usuario->email == $mail && $usuario == $pwd){
                return true;
            }else{
                return false;
            }
    }

    public function buscarUsuario($mail,$pwd){
        $usuario = User::where('email','=',$mail)->first();
        print_r($usuario);
        if($usuario){
            if($this->validarUser($usuario,$mail,$pwd)){
                $_SESSION['start'] = $usuario;
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}