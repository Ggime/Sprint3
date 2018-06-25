<?php
#conexion a base de dato
     $db_host="mysql:host=localhost";
     $usuario = "root";//post usuario
     $pass = "root";// post pass

     try {
       $db = new PDO($db_host, $usuario, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
     } catch (Exception $e) {
       echo "Hubo un error: " . $e->getMessage();
       exit;
     }

$db->beginTransaction();
try{
  #creamos la base de dato
  $sql = "drop DATABASE IF EXISTS db_befit";
  $stmt = $db->exec($sql);

  #creamos la base de dato
  $sql = "CREATE DATABASE  db_befit";
  $stmt = $db->exec($sql);

  $sql = "use db_befit;";
  $stmt = $db->exec($sql);
  #seleccionamos la base de datos
  //USE db_befit;

  #creamos tablas
  $createUsuarios = "CREATE TABLE IF NOT EXISTS usuarios
    (id int AUTO_INCREMENT not null primary key,
    creado timestamp,
    nombre varchar(100) not null,
    apellido varchar(100) not null,
    telefono int(15) not null,
    email varchar(50) unique not null,
    edad  varchar(50) not null,
    barrio varchar(20) not null,
    pass varchar(100) not null,
    foto varchar(100)
    )";
    $stmtUsuarios = $db->exec($createUsuarios);

    $createactividad = "CREATE TABLE IF NOT EXISTS actividad(
      id int AUTO_INCREMENT not null primary key,
      nombre varchar(100) not null,
      lugar int not null,
      id_genero int not null ,
      id_ubicacion int not null ,
      fecha date not null,
      horario_desde time not null,
      horario_hasta time not null,
      descripcion text not null,
      precio int not null
    )";
      $stmtActividad = $db->exec($createactividad);

  $createUsuarios_actividad = "CREATE TABLE IF NOT EXISTS usuarios_actividad(
    id int AUTO_INCREMENT not null primary key,
    id_usuario int ,
    id_actividad int );";
    $stmtUsuariosActividad = $db->exec($createUsuarios_actividad);


  $createUbicacion = "CREATE TABLE IF NOT EXISTS ubicacion(
    id int AUTO_INCREMENT not null primary key,
    barrio varchar(50) not null)";
    $stmtUbicacion = $db->exec($createUbicacion);


  $createGenero = "CREATE TABLE IF NOT EXISTS genero(
    id int AUTO_INCREMENT not null primary key,
    tipo varchar(50) not null)";
    $stmtGenero = $db->exec($createGenero);

    $altUsuAct = "ALTER TABLE `db_befit`.`usuarios_actividad`
    ADD INDEX `fk_usuarios_actividad_1_idx` (`id_usuario` ASC),
    ADD INDEX `fk_usuarios_actividad_2_idx` (`id_actividad` ASC);
    ALTER TABLE `db_befit`.`usuarios_actividad`
    ADD CONSTRAINT `fk_usuarios_actividad_1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `db_befit`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    ADD CONSTRAINT `fk_usuarios_actividad_2`
    FOREIGN KEY (`id_actividad`)
    REFERENCES `db_befit`.`actividad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION;";
    $altUA = $db->exec($altUsuAct);

    $altActividad = "
      ALTER TABLE `db_befit`.`actividad`
      ADD CONSTRAINT `fk_actividad_1`
      FOREIGN KEY (`id_genero`)
      REFERENCES `db_befit`.`genero` (`id`)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
      ADD CONSTRAINT `fk_actividad_2`
      FOREIGN KEY (`id_ubicacion`)
      REFERENCES `db_befit`.`ubicacion` (`id`)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION;";
    $altAct = $db->exec($altActividad);


    $db->commit();
    }catch(PDOException $e){
      echo 'error BD '.$e->getMessage();
      $db->rollback();
    }

  echo 'se creo la base de datos'; die;
