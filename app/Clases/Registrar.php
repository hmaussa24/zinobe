<?php

require '../../vendor/autoload.php';
require '../../config/database.php';
require 'Validacion.php';
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\DB;
use App\entities\User;


class Registrar{


    function registrarUsuario(Request $request){
       
        
        $user = new User();
        //$validar = new Validacion();
        //$datos = array(
          //  "name" => $request->get('name'),
           // "doc" => $request->get('doc'),
            // "email" => $request->get('email'),
           // "password" => $request->get('password')
       // );
        //print_r($datos);
        //$validar->validarRegistro($datos);
        $user->nombre = $request->get('name');
        $user->doc = $request->get('doc');
        $user->email = $request->get('email');
        $user->pais = $request->get('pais');
        $user->password = $request->get('password');
        
        $user->save();
        header("Location: ../../");
    }
}
?>