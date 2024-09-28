<?php
require_once ("../database/Database.php");
$bdd = new Database();


$new_nombre = isset($_POST['new_nombre']) ? $_POST['new_nombre'] : "";
$new_descripcion = isset( $_POST['new_descripcion']) ? $_POST['new_descripcion'] : "";
$new_tipo = isset($_POST['new_tipo']) ?$_POST['new_tipo'] : "";
$new_id_unico = isset($_POST['new_id_unico']) ?$_POST['new_id_unico'] : "";
$new_img = isset($_POST['new_img']) ? $_POST['new_img'] : "";

$imagenYaExistente = false;
$msjError = "";
$rutaParaGuardarEnBdd = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if ($_FILES["new_img"]["error"] > 0) {
        $msjError = $_FILES["new_img"]["error"] == 4 ? "El pokemon debe tener una imagen." : "Ocurrio un error al subir el archivo. Intente nuevamente.";
    }else {
        //echo "la img subida es: " . $_FILES["new_img"]["name"];
        $extension = pathinfo($_FILES["new_img"]["name"], PATHINFO_EXTENSION);

        if ($extension == "png" || $extension == "jpg" || $extension == "webp" || $extension == "avif") {

            $nombreImgSubidaConExtension = $_FILES["new_img"]["name"];
            $rutaRelativaTemp = "../assets/pokemones/" . $nombreImgSubidaConExtension;

            if (file_exists($rutaRelativaTemp)) {
                $msjError = "Ya existe un pokemon con la imagen: " . $nombreImgSubidaConExtension;
            } else {
                move_uploaded_file($_FILES["new_img"]["tmp_name"], $rutaRelativaTemp);
                $rutaParaGuardarEnBdd = "/TP-Pokedex/assets/pokemones/" . $nombreImgSubidaConExtension;
                //echo "luego de moverla del temp, la ruta que tenes q poner en la BDD es: " . $rutaParaGuardarEnBdd;
            }
        } else {
            $msjError = "Archivo de formato inválido.";
        }
    }


    if ($new_nombre == "" || $new_descripcion == "" || $new_id_unico == "" || $new_tipo == "") {
        $msjError = "Los campos no deben estar vacios.";
        header("location: ../views/nuevoPokemon.php?msj=".$msjError);
        exit();
    }

    if ($new_id_unico < 500){
        $msjError = "El número identificador debe ser mayor o igual a 500.";
        header("location: ../views/nuevoPokemon.php?msj=".$msjError);
        exit();
    }

    if ($bdd->buscarPokemonPorNumeroIdentificador($new_id_unico) != null){
        $msjError = "Ya hay un pokemon con ese número identificador.";
        header("location: ../views/nuevoPokemon.php?msj=".$msjError);
        exit();
    }

    if ($bdd->bucarPokemonPorNombre($new_nombre) != null){
        $msjError = "Ya hay un pokemon con ese nombre.";
    }

    if ($msjError != ""){
        header("location: ../views/nuevoPokemon.php?msj=".$msjError);
        exit();
    }

    $bdd->crearPokemon($new_nombre, $new_descripcion, $new_id_unico, $new_tipo, $rutaParaGuardarEnBdd);
    $msjExito = "Se ha creado el pokemon con exito.";
    //echo "TE CREO EL POKE Y LA RUTA IMG ES: "  . $rutaParaGuardarEnBdd;
    header("location: ../index.php?eliminacionExitosa=".$msjExito);
    exit();
}



