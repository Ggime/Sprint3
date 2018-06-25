<?php

//namespace App\class;

class Database
{
    private $dsn = "mysql:dbname=db_befit;host=localhost;port=3306";
    private $usuario = "root";
    private $password = "";
    private $errorOpt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    private $db;

    public function __construct(){
      try {
        $this->db = new PDO($this->dsn, $this->usuario, $this->password, $this->errorOpt);
      } catch (Exception $e) {
        echo "Hubo un error: " . $e->getMessage();
        exit;
      }
    }


    public function guardarUsuario (Usuario $datos, $archivo = null){

      $nombre = $datos->getNombre();
      $apellido = $datos->getApellido();
      $telefono = $datos->getTelefono();
      $email = $datos->getEmail();
      $edad = $datos->getEdad();
      $barrio = $datos->getBarrio();
      $pass = $datos->hashPass();

      $consulta = $this->db->prepare(
        "INSERT into usuarios
          (nombre, apellido,	telefono,	email,	edad,	barrio,	pass, foto)
        VALUES( :nombre, :apellido, :telefono, :email, :edad, :barrio, :pass, :archivo)");
      $consulta->bindValue(':nombre',$nombre);
      $consulta->bindValue(':apellido',$apellido);
      $consulta->bindValue(':telefono',$telefono);
      $consulta->bindValue(':email',$email);
      $consulta->bindValue(':edad',$edad);
      $consulta->bindValue(':barrio',$barrio);
      $consulta->bindValue(':pass',$pass);
      $consulta->bindValue(':archivo', $archivo);

      $consulta->execute();
    }


    function guardarImagen($imagen, $email){
      $errores = [];
      //var_dump($imagen);
      //echo 'el mail es->'.$email;
      if (isset($imagen)){
        $archivo = $imagen['name'];
        $ext = pathinfo($archivo, PATHINFO_EXTENSION);
        $archivoFisico = $imagen['tmp_name'];
      //echo '<br>Si esta la imagen....'.$archivo.', '.$ext.', '.$archivoFisico;
        if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
          $dondeEstoyParado = dirname(__FILE__);
          $rutaFinalConNombre = $dondeEstoyParado . '/../img/' . $email . '.' . $ext;
          move_uploaded_file($archivoFisico, $rutaFinalConNombre);
          //echo '<br>Si es la ext....'.$dondeEstoyParado.', '.$rutaFinalConNombre; die;

        } else {
          $errores['error'] = "El formato de tu foto de perfil tiene que ser JPG, PNG o JPEG.";
          //die ($errores);
        }
      }
      return $errores;
    }

    public function traerRegistros() {
      global $db;
      $consulta = $db->prepare("SELECT * FROM usuarios");
      $consulta->execute();
      $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
      // $todosDatos = [];
      // foreach ($resultado as $usuario) {
      //   $todosDatos[] = new Usuario($usuario);
      // }
      // return $todosDatos;
      return $resultado;
    }

    public function traerPorId($id){
      $consulta = $this->db->prepare("SELECT * FROM usuarios WHERE id = $id");
      $consulta->execute();
      $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
      return $resultado;
    }


    function existeEmail($email){
     $consulta = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email");
     $consulta->bindValue(':email', $email);
     $consulta->execute();
     $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
     return $resultado;
   }








}
