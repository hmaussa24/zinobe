<?php
require '../../vendor/autoload.php';
use Illuminate\Support\Facades\Validator as val;  

class Validacion {

    

    public function validarRegistro(array $data)
    {
        return val::make($data, [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'doc' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }
}