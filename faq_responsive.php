<?php require_once('autoload.php'); ?>

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
    <div class="cabeza">
          <h2><a id="top">Preguntas Frecuentes</a></h2>
      </div>
     <section>
            <div class="preyres">
              <div class="preguntas">
                <h3><label for="primero">¿Qué és Be-Fit!?</label></h3>
              </div>
              <input type="checkbox" class="dar-clic" id="primero">
              <div class="respuestas">
                <p>Somos un catálogo diseñado para mostrarte la variedad de actividades físicas que podes hacer cerca de tu ubicación. Recompilamos los datos de todos los gimnasios y profesores particulares para mostrarte que actividades tenés disponibles y sus respectivos horarios.</p>
              </div>
            </div>
            <div class="preyres">
              <div class="preguntas">
                <h3><label for="segundo">¿De qué sirve registrarme?</label></h3>
              </div>
              <input type="checkbox" class="dar-clic" id="segundo">
              <div class="respuestas">
                <p>Al registrarte te sumas a la comunidad Be-Fit, donde podrás marcar tus actividades favoritas y de esta manera podemos personalizar la página a tus gustos particulares. También vas a poder agendar las actividades y sesiones en el calendario, facilitando tu organización diaria. También vas a poder optar por recibir mensajes vía e-mail, sms o Whatsapp con recordatorios sobre sesiones que hayas reservado</p>
              </div>
            </div>
            <div class="preyres">
              <div class="preguntas">
                <h3> <label for="tercero">¿Quién tiene acceso a mis datos?</label></h3>
              </div>
              <input type="checkbox" class="dar-clic" id="tercero">
              <div class="respuestas">
                <p>Nuestras páginas están protegidas con encrypcion, por lo tanto tus datos sirven únicamente para mostrarte las actividades que te rodean. Ningún otro usuario va a tener acceso a tu información privada.</p>
              </div>
            </div>
            <div class="preyres">
              <div class="preguntas">
                <h3><label for="cuarto">¿Que és una sesión?</label></h3>
              </div>
              <input type="checkbox" class="dar-clic" id="cuarto">
              <div class="respuestas">
                <p>Una sesión es el tiempo determinado que dura una actividad. Vos podes reservar una sesión de cualquier actividad y así el organizador de dicha actividad queda informado de tu asistencia a la practica/actividad.</p>
              </div>
            </div>
            <div class="preyres">
              <div class="preguntas">
                <h3><label for="quinta">¿Con cuanta anticipación puedo reservar una sesión?</label></h3>
              </div>
              <input type="checkbox" class="dar-clic" id="quinta">
              <div class="respuestas">
                <p>El tiempo de anticipación o cancelación de una sesión queda predeterminado por el organizador. Entrando a la actividad de la que deseas participar se especifican los tiempos exactos de anticipación o cancelación. De ésta manera el organizador puede armar la actividad de una manera precisa y acorde a sus participantes.</p>
              </div>
            </div>
        </section>
        <section>
          <div class="consulta">
          <h3>Mandanos tu propia pregunta</h3>
          <textarea id="texto" name="name" rows="8" cols="70" placeholder="Hace tu pregunta"></textarea>
          <input id="boton" type="button" name="manda" value="Enviar" placeholder="Enviar">
        </div>
        </section>
      <?php require_once('footer.php')?>
  </body>
</html>
