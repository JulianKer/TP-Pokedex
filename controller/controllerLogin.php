<?php
$usuario = "";
$password = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = $_POST['usuario'] ?: "";
    $password = $_POST['password'] ?: "";

    if ($usuario == "" || $password == "") {
        $error = "Los campos no puede estar vacios";
        header("location: /TP-Pokedex/views/login.php?error=" . $error);
    }else{

        //  ------------- HACER CUANDO TENGAMOS LA BDD-------------
        // como NO estan vacios, TENGO Q BUSCARLOS EN EL BDD PARA VER SI EXISTE ESE USER Y DESP TE REDIRIJO,

        header("Location: /TP-Pokedex/index.php");
    }

}
