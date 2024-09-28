<?php
require_once ("../database/Database.php");
$bdd = new Database();

$IdPokemon = isset($_POST["hidden"]) ? $_POST["hidden"] : "";
$pokemonEncontrado = $bdd->buscarPokemonPorId($IdPokemon);

$nombre = isset($_POST['modif_nombre']) ? $_POST['modif_nombre'] : "";
$descripcion = isset($_POST['modif_descripcion']) ? $_POST['modif_descripcion'] : "";
$idUnicoPokemon = isset($_POST['modif_id_unico']) ? $_POST['modif_id_unico'] : "";
$tipoPokemon = isset($_POST['modif_tipo']) ? $_POST['modif_tipo'] : "";

$msjError = "";
$imagenYaExistente = false;
$rutaParaGuardarEnBdd = "";
/*
echo $inputHidden;
echo $nombre;
echo $descripcion;
echo $idUnicoPokemon;
echo $tipoPokemon;
echo $imagen;*/

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    if ($pokemonEncontrado != null){

/*------------inicio suba de imagen--------------------*/
        if ($_FILES["modif_img"]["error"] > 0) {
            $msjError = "Ocurrio un error al subir el archivo. Intente nuevamente.";
            $rutaParaGuardarEnBdd = $pokemonEncontrado[0]["imagen"];

        }else{
            //echo "la img subida es: " . $_FILES["modif_img"]["name"];

            $extension = pathinfo($_FILES["modif_img"]["name"], PATHINFO_EXTENSION);
            if ($extension == "png" || $extension == "jpg" || $extension == "webp" || $extension == "avif") {

                $nombreImgSubidaConExtension = $_FILES["modif_img"]["name"];
                $rutaRelativaTemp = "../assets/pokemones/" . $nombreImgSubidaConExtension;

                if (file_exists($rutaRelativaTemp)) {
                    $msjError = "Ya existe un pokemon con la imagen: " . $nombreImgSubidaConExtension;
                    $imagenYaExistente = true;
                } else {
                    move_uploaded_file($_FILES["modif_img"]["tmp_name"], $rutaRelativaTemp);
                    $rutaParaGuardarEnBdd = "/TP-Pokedex/assets/pokemones/" . $nombreImgSubidaConExtension;
                    $rutaRelativaABorrar = str_replace('/TP-Pokedex/', '../', $pokemonEncontrado[0]["imagen"]);
                    unlink($rutaRelativaABorrar);

                    //echo "luego de moverla del temp, la ruta que tenes q poner en la BDD es: " . $rutaParaGuardarEnBdd;
                }
            }else{
                $msjError = "Archivo de formato inválido.";
                $rutaParaGuardarEnBdd = $pokemonEncontrado[0]["imagen"];
                header("location: ../views/modificacionPokemon.php?id_pokemon=".$IdPokemon."&msj=".$msjError);
                exit();
            }
        }
/*-------------------fin suba de imagen--------------------*/


        if ($nombre == "" || $descripcion == "" || $idUnicoPokemon == "" ||$tipoPokemon == "") {
            $msjError = "Los campos no deben estar vacios.";
            header("location: ../views/modificacionPokemon.php?id_pokemon=".$IdPokemon."&msj=".$msjError);
            exit();
        }

        if ($idUnicoPokemon < 500){
            $msjError = "El número identificador debe ser mayor o igual a 500.";
            header("location: ../views/modificacionPokemon.php?id_pokemon=".$IdPokemon."&msj=".$msjError);
            exit();
        }

        $pokemonConMismoIdUnicoIdentificadorEncontrado = $bdd->buscarPokemonPorNumeroIdentificador($idUnicoPokemon);
        if ($pokemonConMismoIdUnicoIdentificadorEncontrado != null){
            if($idUnicoPokemon == $bdd->buscarPokemonPorNumeroIdentificador($idUnicoPokemon)[0]["numero_identificador"] && $IdPokemon != $bdd->buscarPokemonPorNumeroIdentificador($idUnicoPokemon)[0]["id_pokemon"]){
                $msjError = "Ya hay un pokemon con ese número identificador.";
                header("location: ../views/modificacionPokemon.php?id_pokemon=".$IdPokemon."&msj=".$msjError);
                exit();
            }
        }

        $pokemonConMismoNombreEncontrado = $bdd->bucarPokemonPorNombre($nombre);
        if ($pokemonConMismoNombreEncontrado != null){
            if($nombre == $bdd->bucarPokemonPorNombre($nombre)[0]["nombre"] && $IdPokemon != $bdd->bucarPokemonPorNombre($nombre)[0]["id_pokemon"]){
                $msjError = "Ya hay un pokemon con ese nombre.";
                header("location: ../views/modificacionPokemon.php?id_pokemon=".$IdPokemon."&msj=".$msjError);
                exit();
            }
        }


        if ($imagenYaExistente){
            header("location: ../views/modificacionPokemon.php?id_pokemon=".$IdPokemon."&msj=".$msjError);
            exit();
        }

        $bdd->editarPokemon($nombre, $descripcion, $idUnicoPokemon, $tipoPokemon, $rutaParaGuardarEnBdd, $IdPokemon);
        $msjExito = "Se ha modificado el pokemon con exito.";
        //echo "TE UPDATEO Y LA RUTA IMG ES: "  . $rutaParaGuardarEnBdd;

        header("location: ../index.php?eliminacionExitosa=".$msjExito);
        exit();

    }
}







