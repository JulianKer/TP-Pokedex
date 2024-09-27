<?php
session_start();

require_once ("../database/Database.php");
$usuario = "";
$password = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : "";
    $password = isset($_POST['password']) ? trim($_POST['password']) : "";

    if ($usuario == "" || $password == "") {
        $error = "Los campos no puede estar vacios";

    }else{

        $bdd = new Database();

        if ($bdd->getError() != ""){
            $error = $bdd->getError();
        }else{
            $resultado = $bdd->saberSiExisteElUsuario($usuario, $password);

            if($resultado != null) {
                $_SESSION['usuario'] = $usuario;
                echo $_SESSION['usuario'];
                echo isset($_SESSION['usuario']);
                header("Location: /TP-Pokedex/index.php");
                exit();

            }else{
                $error = "¡Usuario o contraseña incorrecta!";
            }
        }
    }

    header("location: /TP-Pokedex/views/login.php?error=" . urldecode($error));
    exit();
}
