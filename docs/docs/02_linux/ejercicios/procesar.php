<?php
ini_set("display_errors", true);
error_reporting(E_ALL);
/**
 * @param $frase representa una solución que queremos verificar
 * @param $solucion es un array de palabras con la solución
 * @return booleano si la frase coincide con la solución sin tener en cuenta los espacios en blanco
 */
function contains(string|null $respuesta, string|null $solucion): bool
{
  $respuesta = explode(" ", $respuesta);
  $solucion = explode(" ", $solucion);
  $rtdo = array_diff($solucion, $respuesta);
  return (!(bool)count($rtdo));
}

$respuesta = htmlspecialchars(filter_input(INPUT_POST, "respuesta"));
$respuesta = trim(preg_replace('/\s+/', ' ', $respuesta));
$solucion = htmlspecialchars(filter_input(INPUT_POST, "solucion"));

$ejercicio = filter_input(INPUT_POST, "ejercicio");

$rtdo = contains($respuesta, $solucion);
$msj = $rtdo ? "<span style='color:green'>Muy bien</span>" : "<span style='color:red'>No parece una buena solución</span>";

$msj .= "<br />Respuesta <span style='color:green'>$respuesta</span>";
$msj .= "<br />Solución <span style='color:green'>$solucion</span>";


$paginaDeReferencia = $_SERVER['HTTP_REFERER'];
header("Refresh: 5; url=$paginaDeReferencia");

?>
<!doctype html>
<html itemscope itemtype="http://schema.org/WebPage" lang="es" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">


    <link rel="shortcut icon" href="/despliegue/contenido/favicons/favicon.ico">

    <title>Ejercicios | Recursos de apoyo al aprendizaje</title>
    <meta name="description" content="Ejercicios de Comandos Básicos en Linux Navegación y Visualización de Archivos 1.1. Cambia de directorio
Usa cd para navegar al directorio /home y luego vuelve al directorio raíz /. 1.2. Lista el contenido del directorio
Usa ls para listar los archivos y carpetas en /home. Prueba también las opciones -l y -a para ver información detallada y archivos ocultos.
2. Creación y Eliminación de Archivos/Directorios 2.1. Crea directorios y archivos
Crea un directorio llamado proyecto en tu home con mkdir y, dentro de él, crea tres archivos vacíos (index.html, style.css, app.js) usando touch.">

    <link rel="preload"
          href="/despliegue/contenido/scss/main.min.966e68cbd7eed6da81c6c482a88d89583bb2d0988353bc6d8617f4656856a072.css"
          as="style">
    <link href="/despliegue/contenido/scss/main.min.966e68cbd7eed6da81c6c482a88d89583bb2d0988353bc6d8617f4656856a072.css"
          rel="stylesheet" integrity="">

    <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous"></script>

</head>
<header>
    <nav class="td-navbar js-navbar-scroll " data-bs-theme="dark">
        <div class="container-fluid flex-column flex-md-row ">
            <a class="navbar-brand" href="/despliegue/contenido/"><span class="navbar-brand__logo navbar-logo">
    <img src="/despliegue/contenido/images/logo.png" alt="Logo" width="150" height="auto"/>
    </span><span class="navbar-brand__name">Recursos de apoyo al aprendizaje</span></a>
            <div class="td-navbar-nav-scroll ms-md-auto" id="main_navbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/despliegue/contenido/docs/02_docker/"><span>Docker</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/despliegue/contenido/docs/03_hugo/"><span>Hugo</span></a>
                    </li>
                    <li class="td-light-dark-menu nav-item dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                            <symbol id="check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </symbol>
                            <symbol id="circle-half" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
                            </symbol>
                            <symbol id="moon-stars-fill" viewBox="0 0 16 16">
                                <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
                                <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
                            </symbol>
                            <symbol id="sun-fill" viewBox="0 0 16 16">
                                <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                            </symbol>
                        </svg>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<body class="td-section">

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="text-center p-4" style="border: 2px solid #ccc; background-color: #f9f9f9;">
        <h1><?= $msj ?></h1>
    </div>
</div>
</body>
</html>
