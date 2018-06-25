<?php

//namespace App\class;

class Usuario
{
    private $id;
    private $nombre;
    private $apellidos;
    private $telefono;
    private $email;
    private $edad;
    private $barrio;
    private $foto;
    private $pass;


    public function __construct($datos){
      $this->nombre = $datos['nombre'];
      $this->apellido = $datos['apellido'];
      $this->telefono = $datos['telefono'];
      $this->email = $datos['email'];
      $this->edad = $datos['edad'];
      $this->barrio = $datos['barrio'];
      //$this->foto = $datos['foto'];
      $this->pass = $datos['pass'];
      $this->id = $datos['id']??null;
    }

    public function setNombre($nombre){
      $this->nombre = $nombre;
    }

    public function setApellido($apellido){
      $this->apellido = $apellido;
    }

    public function setTelefono($telefono){
      $this->telefono = $telefono;
    }

    public function setEmail($email){
      $this->email = $email;
    }

    public function setEdad($edad){
      $this->edad = $edad;
    }

    public function setBarrio($barrio){
      $this->barrio = $barrio;
    }

    public function setFoto($foto){
      $this->foto = $foto;
    }

    public function setPass($pass){
      $this->pass = $pass;
    }



    public function getId(){
      return $this->id;
    }

    public function getNombre(){
      return $this->nombre;
    }

    public function getApellido(){
      return $this->apellido;
    }

    public function getTelefono(){
      return $this->telefono;
    }

    public function getEmail(){
      return $this->email;
    }

    public function getBarrio(){
      return $this->barrio;
    }

    public function getEdad(){
      return $this->edad;
    }

    public function getFoto(){
      return $this->foto;
    }

    public function getPass(){
      return $this->pass;
    }

    public function hashPass(){
      return password_hash( $this->getPass(),PASSWORD_DEFAULT);
    }


    //public function crearUsuario();

}
