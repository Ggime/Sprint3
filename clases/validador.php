<?php

//namespace App\class;

class Validador
{
/**
  $datos recibe de $_POST
  $archivo recibe de $_FILES['foto']

*/


  public function validarRegistro($datos, $db, $archivo=null){
    $errores = [];
    if ($datos ['nombre'] == '') {
      $errores ['nombre'] = "Completa tu nombre";
    }

    if ($datos ['apellido'] == '') {
      $errores ['apellido'] = "Completa tu apellido";
    }

    if ($datos ['telefono'] == '') {
      $errores ['telefono'] = "Ingresa un Teléfono";
    } elseif (!filter_var($datos['telefono'], FILTER_VALIDATE_INT)){
      $errores ['telefono'] = "Teléfono invalido";
    }

    if ($datos ['edad'] == '*Elegi tu rango de edad'){
      $errores ['edad'] = "Selecciona tu rango de edad";
    }

    if ($datos ['barrio'] == '*Elegi tu barrio'){
      $errores ['barrio'] = "Selecciona tu barrio";
    }

    if ($datos ['email'] == ''){
      $errores ['email'] = "Completa tu email";
    } elseif (!filter_var($datos ['email'], FILTER_VALIDATE_EMAIL)){
      $errores ['email'] = "Email invalido";
    } elseif ($db->existeEmail($datos ['email'])) {
      $errores ['email'] = "Este email ya está registrado";
    }

    if ($datos ['pass'] == '' || $datos ['rpass'] == ''){
      $errores ['pass'] = "Completa tus contraseñas";
    } elseif ($datos ['pass'] != $datos ['rpass']){
      $errores ['pass'] = "Tus contraseñas deben coincidir";
    }

    if($archivo){
        //$archivo = $archivo['name'];
        $ext = pathinfo($archivo['name'], PATHINFO_EXTENSION);
        $archivoFisico = $archivo['tmp_name'];
        if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png'){
          $errores['foto'] = "Tu foto de perfil debe ser JPG, PNG o JPEG.";
        }
      }

    return $errores;
  }


    function validarLogin($datos, $db){
      var_dump ($datos);
  		$errores = [];
      $email = trim($datos['email']);
  		$pass = trim($datos['pass']);

      //$usuario = null;
  		if ($datos['email'] == '') {
  			$errores['email'] = 'Completá tu email';
  		} elseif (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
  			$errores['email'] = 'Formato de email inválido';

  		} elseif (!$usuario = $db->existeEmail($email)) {
  			$errores['email'] = 'Este email no está registrado';
  		} else {
        //echo '->'.password_hash($pass, PASSWORD_DEFAULT).'<-'; 123123123
         //echo 'El ver->'.password_verify($pass, $usuario['pass']); exit;
          if ($datos['pass'] == '') {
           $errores['pass'] = 'Ingresa tu Password';
         }elseif(!password_verify($pass, $usuario['pass'])) {
            $errores['pass'] = "Datos Inválidos";
        }
      }
      return $errores;
    }
    /*function validarImagen($archivo){
      if($archivo['name']){
          $archivo = $archivo['name'];
          $ext = pathinfo($archivo, PATHINFO_EXTENSION);
          $archivoFisico = $archivo['tmp_name'];
          if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png'){
          $errores['foto'] = "Tu foto de perfil debe ser JPG, PNG o JPEG.";
           }
         }*/


}
