<?php
session_start();

$usuario = "";
$password = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : "";
    $password = isset($_POST['password']) ? trim($_POST['password']) : "";

    if ($usuario == "" || $password == "") {
        $error = "Los campos no puede estar vacios";
        header("location: /TP-Pokedex/views/login.php?error=" . urldecode($error));
        exit();
    }else{

        //  ------------- HACER CUANDO TENGAMOS LA BDD-------------
        // como NO estan vacios, TENGO Q BUSCARLOS EN EL BDD PARA VER SI EXISTE ESE USER Y DESP TE REDIRIJO,

        $_SESSION['usuario'] = $usuario;
        echo $_SESSION['usuario'];
        echo isset($_SESSION['usuario']);
        header("Location: /TP-Pokedex/index.php");
        exit();
    }

}
