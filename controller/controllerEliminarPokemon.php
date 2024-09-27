<?php
require_once ("../database/Database.php");

$bdd = new Database();
$idPokemonAEliminar = isset($_GET["id_pokemon"]) ? $_GET["id_pokemon"] : 0;
$rutaImg = "../../"; // para ir al raiz

if ($idPokemonAEliminar != 0){
    $pokemonEncontrado = $bdd->getPorQuery("SELECT * FROM pokemon WHERE id_pokemon = $idPokemonAEliminar");

    if ($pokemonEncontrado != null){
        $rutaImg .= $pokemonEncontrado[0]["imagen"];

        if (file_exists($rutaImg)){
            unlink($rutaImg); // ---> elimino la img de la carpeta
            $bdd->eliminarPokemonPorId($idPokemonAEliminar); // ---> elimino el poke de la bdd
            header("location: /TP-Pokedex/index.php?eliminacionExitosa=" . urldecode("Pokemon eliminado con éxito."));
            exit();
        }

    }
}


