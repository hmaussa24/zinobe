<?php
require 'vendor/autoload.php';
require 'config/database.php';

use Illuminate\Support\Facades\DB;
use App\entities\User;

class BuscarUser{
    public function buscarUsuario($datos){
        $users = User::where('doc','=', $datos)->orWhere('email', '=', $datos)->first();

        return $users;
    }
}
