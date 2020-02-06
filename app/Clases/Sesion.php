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

    public function buscarUsuario($mail,$pwe){
        $usuario = User::where('email','=',$email)->first();
        if($usuario){
            if(validarUser($usuario,$emil,$pwd)){
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