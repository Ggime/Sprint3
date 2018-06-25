<?php
  require_once('autoload.php');
  $aut = new Autentificador();
  if ($aut->estaLogueado()) {
  header('location: index.php');
  exit;	}
?>

<?php
    $edades = ['*Elegi tu rango de edad','Menos de 12 años','Entre 12 y 18','Entre 18 y 25','Entre 25 y 40','Más de 40'];
    $barrios = ['*Elegi tu barrio','Palermo','Recoleta','Belgrano','San Telmo', 'Retiro'];

    $nombre = '';
    $apellido = '';
    $email = '';
    $telefono ='';
    $edad ='';
    $barrio ='';
    $pass ='';
    $errores = [];

      if ($_POST){
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $telefono = trim($_POST['telefono']);
        $email = trim($_POST['email']);
        $edad = $_POST['edad'];
        $barrio = $_POST['barrio'];
        $pass = $_POST['pass'];

        $validador = new Validador();
        $db = new Database();


        if($_FILES['foto']['name']){
          $errores = $validador->validarRegistro($_POST, $db, $_FILES['foto']);
        } else {
          $errores = $validador->validarRegistro($_POST, $db);
        }
        $errorImagen = '';


          if (empty($errores)) {
            if(($_FILES['foto']['name'])){
              $errorImagen = $db->guardarImagen($_FILES['foto'],$email);
            }
            if (!$errorImagen){
              $usuarios = new Usuario($_POST);
              if($_FILES['foto']['name']){
                $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                $rutaFinalConNombre = 'img/' . $email . '.' . $ext;
                $db->guardarUsuario($usuarios, $rutaFinalConNombre);
              }else{
                $db->guardarUsuario($usuarios);
              }


              header('location: iniciar_responsive.php');
              exit;
            }
          }
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
    <?php require_once('header.php')?>
    <?php /*if (!empty($errores)): ?>
      <div class = "errores">
        <ul style="color:red;">
          <?php foreach ($errores as $key => $error): ?>
          <li><?=$error?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; */?>
      <section class="iniciar">
        <div class="ingresar">
            <form method="post" enctype="multipart/form-data">
              <p>REGISTRATE EN FIT</p>
              <div class="face">
                <p>Inicia sesión con facebook <a href="https://es-la.facebook.com" target="_blank"></a></p>

              </div>
              <br>
              <div class="nombre">
                <label for="">
                  <input type="text" id="" name="nombre" placeholder="*Tu Nombre" value="<?=$nombre?>">
                </label>
                <label for="">
              <input type="text" id="" name="apellido" placeholder="*Tu Apellido" value="<?=$apellido?>">
                </label>
              </div>
              <div class="mensajes">
                  <ul>
                    <li><?=isset($errores['nombre'])? $errores['nombre'] : ''; ?></li>
                    <li><?=isset($errores['apellido'])? $errores['apellido'] : ''; ?></li>
                 </ul>
              </div>

              <div class="nombre">
                <label for="">
                  <input type="text" id="" name="telefono" placeholder="*Un teléfono" value="<?=$telefono?>">
                </label>
                <label for="">
                  <input type="text" id="" name="email" placeholder="*Tu Email" value="<?=$email?>">
                </label>
                  </div>
              <div class="mensajes">
                  <ul>
                    <li><?=isset($errores['telefono'])? $errores['telefono'] : ''; ?></li>
                    <li><?=isset($errores['email'])? $errores['email'] : ''; ?></li>
                 </ul>
              </div>

              <div class="selectores">
                <label for="">
                  <select name="edad">
                    <!--<option selected="true" disabled="disabled">Edad</option>-->
                    <?php
                      foreach ($edades as $value) : ?>
                        <?php if ($value == $edad): ?>
                    <option selected value="<?=$value?>"><?=$value?></option>
                  <?php else: ?>
                <option value="<?=$value?>"><?=$value?></option>
                <?php endif; ?>
                <?php endforeach; ?>
                  </select>
              </label>
              </div>
              <div class="mensaje1">
                    <?=isset($errores['edad'])? $errores['edad'] : ''; ?>
                    </div>
                    <div class="selectores">
        <label for="">
            <select name="barrio">
                <!--<option>Elegi tu Barrio</option>-->
                  <?php foreach ($barrios as $value1): ?>
                  <?php if ($value1 == $barrio): ?>
                    <option selected value="<?=$value1?>"><?=$value1?></option>
                  <?php else: ?>
                    <option value="<?=$value1?>"><?=$value1?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </label>
        </div>
        <div class="mensaje1">
              <?=isset($errores['barrio'])? $errores['barrio'] : ''; ?>
        </div>
        <div class="foto">
                <label for="name" >
                  <input type="file" name="foto" value="<?= isset($_FILES['foto']['tmp'])?$_FILES['foto']['tmp']:'';?>" title="Ingresa tu foto de perfil">
                </label>
              </div>
                  <div class="mens">
                  <ul>
                    <li><?=isset($errores['foto'])? $errores['foto'] : ''; ?></li>
                  </ul>
                </div>

    <div class="nombre">
              <input type="password" id="" name="pass" placeholder="Contraseña" value="">
              <input type="password" id="" name="rpass" placeholder="Repetir Contraseña" value="">
              </div>
              <div class="mensa">
                  <ul>
                    <li><?=isset($errores['pass'])? $errores['pass'] : ''; ?></li>
                    <li><?=isset($errores['rpass'])? $errores['rpass'] : ''; ?></li>
                 </ul>
              </div>
              <div class="oki">
                <label class="ok">
                  <input type="checkbox" name="newsletter" value="newsletter"> Quiero recibir novedades de FIT<br>
                  <span class="checkmark"></span>
                </label>
              </div>
              <input type="submit" value="SUMATE!">
            </form>
        </div>
        <div class="regis">
            <img src="img/sport1.png" alt=""class="img_depor">
            <img src="img/sport3.png" alt=""class="img_depor1">
              <br>
            <p>Registrándote en Be-Fit! vas a poder recibir en tu correo lo mejor de la Agenda cada semana!</p>
              <hr>
              <br>
            <p class="imp">Además podés guardar Eventos Favoritos y Subir Actividades!</p>
              <br>
              <hr>
              <br>
            <p>No te quedes afuera, en 1 simple paso podés ser parte de esta comunidad.</p>
        </div>
      </section>
      <?php require_once('footer.php')?>
    </div>
  </body>
</html>
