<?php
require_once('autoload.php');

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

    <section>
       <article class="articulo1">
         <div class="sport">
           <img src="img/depor2.png" alt="">
            </div>
         <div class="info">
           <h2>Be-Fit!</h2>
           <br>
             <h1>¿Donde hacer deporte en Buenos Aires?</h1><br>
               <p>Esta web te ayuda a encontrar TU lugar, TU actividad y TU horario pero sobre todo ofrece conectividad entre la comunidad de Be-Fit! donde podes ingresar tu actividad para ponerte en contacto con otras personas  y así conformar tu propio equipo de entrenamiento.</p><br>
              <br>
               <ul>
                 <li>Ubicación: Esta página cuenta con un geolocalizador ingresando la dirección con un radio de búsqueda de hasta 10 cuadras</li><br>
                 <li>Horarios: Posibilita encontrar la actividad deseada, chequear horarios y días disponibles y así, poder elegir ir antes o después del trabajo, en el horario de almuerzo o si podés disponer de tu tiempo, cuando tengas un rato libre</li><br>
                 <li>Oferta de Actividades: Si sos una persona a la que le gusta el ejercicio al aire libre o indoor, en grupo, en equipo o individual podes encontrar una disciplina que se adapte a tus gustos y necesidades. </li><br>
               </ul>
           </div>
       </article>
    </section>
    <section class="articulo2">
      <div class="espacio">Recomendados</div><br>
        <article class="deportes">
          <div class="imagen">
            <p class="subtitulo">Exterior</p>
            <img src="img/depor.png" class="deporte" alt="">
          </div>
          <div class="imagen">
            <p class="subtitulo">Infantiles</p>
            <img src="img/depor3.png" class="deporte" alt="">
          </div>
          <div class="imagen">
            <p class="subtitulo">Beisbol</p>
            <img src="img/depor4.png" class="deporte" alt="">
          </div>
          <div class="imagen">
            <p class="subtitulo">Stretching</p>
            <img src="img/depor17.png" class="deporte" alt="">
          </div>
        </article>
      </section>
      <section class="articulo2">
        <div class="espacio">Favoritos</div><br>
          <article class="deportes">
            <div class="imagen">
              <p class="subtitulo">Running</p>
              <img src="img/depor7.png" class="deporte" alt="">
            </div>
            <div class="imagen">
              <p class="subtitulo">Gimnasia</p>
              <img src="img/dep2.png" class="deporte" alt="">
            </div>
            <div class="imagen">
              <p class="subtitulo">Yoga</p>
              <img src="img/depor6.png" class="deporte" alt="">
            </div>
            <div class="imagen">
              <p class="subtitulo">Funcional</p>
              <img src="img/depor0.png" class="deporte" alt="">
            </div>
          </article>
        </section>
      <?php require_once('footer.php')?>
  </body>
</html>
