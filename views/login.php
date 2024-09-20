<?php

$error = "";

if (isset($_GET["error"])) {
    $error = $_GET["error"];
}


?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Pokedex</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/TP-Pokedex/styles/login.css">

</head>
<body>

<div class="login-container">
    <div class="login-header">
        <img src="/TP-Pokedex/assets/icons/pokemon-logo.svg" alt="Pokémon Logo">
        <h1>Iniciar Sesión</h1>
    </div>
    <form action="/TP-Pokedex/controller/controllerLogin.php" method="post">
        <div class="mb-3">
            <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuario">
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" id="contrasena" placeholder="Contraseña">
        </div>
        <?php
        if($error != "") {
            echo '<div class="alert alert-danger">' . $error . '</div>';
        }
        ?>

        <button type="submit" class="btn btn-login btn-block w-100">Ingresar</button>
    </form>
    <p class="mt-3">¿No tienes una cuenta? <a href="/TP-Pokedex/views/register.php" class="link-register">Regístrate aquí</a></p>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
