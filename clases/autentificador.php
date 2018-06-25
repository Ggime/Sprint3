<?php
class Autentificador{

  public function loguear(Usuario $usuario){
    $_SESSION['id'] = $usuario->getId();
    header('location:index.php');
    exit;
  }

  public function estaLogueado(){
    return isset($_SESSION['id']);
  }
  public static function mantenerConectado($db){
   if ($_COOKIE['id'] && !$_SESSION['id']){
     $usuarioAr = $db->traerUsuarioId($_COOKIE['id']);
     $usuario = new Usuario($usuarioAr);
     $this->loguear($usuario);
  }
  }
  public function desloguear(){
    setcookie('id', '', time() -10);
    session_destroy();
    header("location:index.php");
    exit();
  }
}
