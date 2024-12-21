<?php

const API_URL = "https://whenisthenextmcufilm.com/api";

# Inicializar una nueva sesión de cURL; ch = cURL handle

$ch = curl_init(API_URL);

// Indicar que queremos recibir el resultado de la petición sin mostrarla por pantalla

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/* Ejecutar la petición
   y guardar el resultado en una variable */

$result = curl_exec($ch);

// Cerrar la sesión de cURL

curl_close($ch);

/* Decodificar la respuesta JSON
   y convertirla en un array asociativo */

$data = json_decode($result, true);

//* Aqui el codigo no continuará hasta que se resuelva la petición

//? Una altermativa sería utilizar file_get_contents para obtener el contenido de la petición. Ejemplo:

// $data = json_decode(file_get_contents(API_URL), true); // Aquí se resuelve la petición

?>




<head>
  <meta charset="UTF-8">
  <title>La próxima película de Marvel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="La próxima filmeria de Marvel">

  <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
  >
</head>

<main>
  <section>
    <h2>La próxima película de Marvel</h2>
    <img src="<?= $data["poster_url"]; ?>" width="200" alt="Poster de <?= $data['title']; ?>">
  </section>
  <hgroup>
    <h3><?= $data['title']; ?> se extrena en <?= $data['days_until']; ?> días.</h3>
    <p>Estreno: <?= $data['release_date']; ?></p>
    <p>La siguiente pelicula de Marvel es: <?= $data["following_production"]['title']; ?></p>
  </hgroup>
</main>






<style>
  :root {
    color-scheme: light dark;
  }

  body {
    display: grid;
    place-content: center;
    min-height: 100vh;
    font-family: system-ui, sans-serif;
  }

  section {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  hgroup {
    text-align: center;
  }

  img {
    border-radius: 10px;
    margin: 0 auto;
  }
</style>