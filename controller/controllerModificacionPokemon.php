<?php
require_once ("../database/Database.php");
$bdd = new Database();

$IdPokemon = isset($_POST["hidden"]) ? $_POST["hidden"] : "";
$pokemonEncontrado = $bdd->buscarPokemonPorId($IdPokemon);

$nombre = isset($_POST['modif_nombre']) ? $_POST['modif_nombre'] : "";
$descripcion = isset($_POST['modif_descripcion']) ? $_POST['modif_descripcion'] : "";
$idUnicoPokemon = isset($_POST['modif_id_unico']) ? $_POST['modif_id_unico'] : "";
$tipoPokemon = isset($_POST['modif_tipo']) ? $_POST['modif_tipo'] : "";
$imagen = isset($_POST['modif_img']) ? $_POST['modif_img'] : $pokemonEncontrado[0]['imagen'];

/*
echo $inputHidden;
echo $nombre;
echo $descripcion;
echo $idUnicoPokemon;
echo $tipoPokemon;
echo $imagen;*/

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if ($pokemonEncontrado != null){
        if ($nombre == "" || $descripcion == "" || $idUnicoPokemon == "" ||$tipoPokemon == "") {
            $msjError = "Los campos no deben estar vacios.";
            header("location: ../views/modificacionPokemon.php?id_pokemon=".$IdPokemon."&msj=".$msjError);
            exit();
        }else if($idUnicoPokemon == $bdd->buscarPokemonPorNumeroIdentificador($idUnicoPokemon)[0]["numero_identificador"] && $IdPokemon != $bdd->buscarPokemonPorNumeroIdentificador($idUnicoPokemon)[0]["id_pokemon"]){
            $msjError = "Ya hay un pokemon con ese número identificador.";
            header("location: ../views/modificacionPokemon.php?id_pokemon=".$IdPokemon."&msj=".$msjError);
            exit();
        }else if($nombre == $bdd->bucarPokemonPorNombre($nombre)[0]["nombre"]){
            $msjError = "Ya hay un pokemon con ese nombre.";
            header("location: ../views/modificacionPokemon.php?id_pokemon=".$IdPokemon."&msj=".$msjError);
            exit();
        }else{
            $bdd->editarPokemon($nombre, $descripcion, $idUnicoPokemon, $tipoPokemon, $imagen, $IdPokemon);
            $msjExito = "Se ha modificado el pokemon con exito.";
            header("location: ../index.php?eliminacionExitosa=".$msjExito);
        }
    }
}







