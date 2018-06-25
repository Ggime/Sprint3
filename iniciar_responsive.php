<?php
    require_once('autoload.php');
?>

<?php
		$aut = new Autentificador();
		if ($aut->estaLogueado()) {
		header('location: index.php');
		exit;	}

	$email = '';
	$pass ='';
	$errores = [];

	if ($_POST) {
		$email = trim($_POST['email']);
		$pass = trim($_POST['pass']);

		$validador = new Validador();
		$errores  = $validador->validarLogin($_POST, $db);
	//	var_dump ($errores);
		if (empty($errores)) {
			$usuarioAr = $db->existeEmail($email);
			$usuario = new Usuario($usuarioAr);
			$aut->loguear($usuario);

			if (isset($_POST["recordar"])) {
	        $aut->mantenerConectado();
	      }
			exit;	}
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

      <section class="iniciar">
        <div class="ingresar">
            <form method="post" enctype="multipart/form-data">
              <p>BIENVENIDO A LA COMUNIDAD BE-FIT!
								<br> Inicia tu sesión para conocer todas las actividades.</p>
              <div class="face">
                <p>Inicia sesión con facebook <a href="https://es-la.facebook.com" target="_blank"></a></p>

              </div>
              <br>

              <div class="nombre">
                <label for="">
                  <input type="text" id="" name="email" placeholder="Tu Email" value="<?=$email?>">
                </label>
                <label for="" class="pass">
                  <input type="password" id="" name="pass" placeholder="Contraseña" value="">
                </label>
              </div>
              <div class="mensajes">
                  <ul>
                    <li><?=isset($errores['email'])? $errores['email'] : ''; ?></li>
                    <li><?=isset($errores['pass'])? $errores['pass'] : ''; ?></li>
                 </ul>
              </div>
               <div class="recor">
                 <p><a href="registro_responsive.php">¿Olvidaste tu contrasena?</a>¿No sos usuario? <a href="registro_responsive.php">Registrate!</a></p>
               </div>

              <div class="oki">
                <label class="ok">
                  <input type="checkbox" name="recordar" value="recordar"> Recordarme<br>
                  <span class="checkmark"></span>
                </label>
              </div>
              <input type="submit" value="INGRESAR">
            </form>
        </div>
        <div class="regis">
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
