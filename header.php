<?php
    require_once('autoload.php');
    $auth = new Autentificador();
    $user = '';
    if ($auth->estaLogueado()){
      $user = $db->traerPorId($_SESSION['id']);
    }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Be-Fit!</title>
  </head>
  <body>
    <div class="general">
      <header class="completo">
        <div class="encabezado">
            <a href="index.php" title="Inicio">
              <div class="logo"></div>
            </a>
          <div class="busqueda">
            <form>
              <div>
                <input class="poner" type="text" id="" name="correo" placeholder="¿Que estás buscando?">
                <button class="buscar" type="button" name="button">Buscar</button>
              </div>
            </form>
          </div>
           <div class="inicio">
              <a href="faq_responsive.php" class="fijo">AYUDA</a>
              <?php if ($auth->estaLogueado()): ?>
                <a href="logout.php"class="fijo">SALIR</a>
                <a href="perfil.php"class="fijo"><?=  strtoupper ($user['nombre']) ?> &nbsp; &nbsp; <img src="<?= $user['foto']?$user['foto']:'img/perfil.png'?>"  class="avatar" alt=""></a>
              <?php else: ?>
              <a href="iniciar_responsive.php" class="fijo">INGRESAR</a>
              <a href="registro_responsive.php" class="movil">REGISTRARSE</a>
              <?php endif; ?>
              <div class="act-contenedor">
                <label class="ul-label" for="ul">ACTIVIDADES<a href="#" class="actividades"></a></label>
                 <input type="checkbox" class="dar-klik" id="ul">
                   <ul class="menun">
                     <li>Hoy</li>
                     <li>Elegir Hora</li>
                     <li>Elegir Fecha</li>
                     <li>Juego en Equipo</li>
                     <li>Indoor</li>
                     <li>Suma tu actividad</li>
                   </ul>
              </div>
              <div class="act-contenedor">
                <label class="ul-label1" for="ul"><img src="img/flecha.png" height="12" width="22" alt=""><a href="#" class="actividades"></a></label>
                 <input type="checkbox" class="dar-klik" id="ul">
                   <ul class="menun">
                     <li>Hoy</li>
                     <li>Elegir Hora</li>
                     <li>Elegir Fecha</li>
                     <li>Juego en Equipo</li>
                     <li>Indoor</li>
                     <li>Suma tu actividad</li>
                   </ul>
              </div>
          </div>
          <nav class="menu">
            <div class="menu-izq">
              <a href="#">Hoy</a>
              <a href="#">Elegir Hora</a>
              <a href="#">Elegir Fecha</a>
            </div>
            <div class="menu-derc">
              <a href="#">Juego en Equipo</a>
              <a href="#">Aire libre</a>
              <a href="#">Indoor</a>
              <a href="#">Suma tu actividad</a>
            </div>
          </nav>
       </div>
     </header>
      </body>
</html>
