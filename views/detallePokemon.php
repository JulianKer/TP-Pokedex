
<?php
session_start();
$estaLogeado = false;

if (isset($_SESSION['usuario'])){
    $estaLogeado = true;
}
?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/TP-Pokedex/styles/detallePokemon.css">
    <title>Inicio | Pokedex</title>
</head>
<body>
    <?php require_once("header.php")?>


    <main>

    </main>


    <?php require_once("footer.php")?>
</body>
</html>
