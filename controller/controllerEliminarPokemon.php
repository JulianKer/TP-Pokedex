<?php
require_once ("../database/Database.php");

$bdd = new Database();
$idPokemonAEliminar = isset($_GET["id_pokemon"]) ? $_GET["id_pokemon"] : 0;

if ($idPokemonAEliminar != 0){
    //$bdd->eliminarPokemonPorId($idPokemonAEliminar);
    header("location: /TP-Pokedex/index.php?eliminacionExitosa=" . urldecode("Pokemon eliminado con éxito."));
    exit();
}


