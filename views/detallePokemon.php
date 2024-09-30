<?php
session_start();
$estaLogeado = false;

if (isset($_SESSION['usuario'])){
    $estaLogeado = true;
}

$idRecibido = isset($_GET["id_pokemon"]) ? $_GET["id_pokemon"] : 0;
require_once ("../database/Database.php");
$bdd = new Database();
$pokemonEncontrado = $bdd->buscarPokemonPorId($idRecibido) != null ? $bdd->buscarPokemonPorId($idRecibido)[0] : null;


if ($idRecibido == 0) {
    header("location: /TP-Pokedex/index.php");
    exit();
}

?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/TP-Pokedex/styles/detallePokemon.css">
    <link rel="icon" href="/TP-Pokedex/assets/icons/pokemon-logo.svg">
    <script src="/TP-Pokedex/js/popupCerrarSesion.js" defer></script>

    <title>Detalle Pokemon | Pokedex</title>
</head>
<body>
<?php require_once("header.php")?>

<section class="fondo-popup" id="popUpCerrarSesion">
    <section class="pop-up">
        <img src="/TP-Pokedex/assets/icons/icon_warning.svg" alt="Ciudado" class="pop-up-check">
        <p class="pop-up-mensaje">¿Seguro desea salir?</p>
        <div>
            <a href="/TP-Pokedex/views/detallePokemon.php?id_pokemon=<?php echo $idRecibido?>" class="btn_cancelar" id="botonCancelarCesrrarSesion">Cancelar</a>
            <a href="" id="botonAceptarCesrrarSesion">Aceptar</a>
        </div>
    </section>
</section>

<?php if ($pokemonEncontrado != null) { ?>
    <main>
        <img src="<?php echo $pokemonEncontrado["imagen"];?>" class="img_pokemon">
        <div class="contenedor_1">
            <h3 class="<?php echo $pokemonEncontrado["nombre_tipo"];?>"> <?php echo $pokemonEncontrado["nombre"];?></h3>
            <div><span>Tipo:</span> <?php echo $pokemonEncontrado["nombre_tipo"];?> <img src="/TP-Pokedex/assets/tipos/<?php echo $pokemonEncontrado["nombre_tipo"];?>.avif" alt="imagen_tipo"></div>
            <h5><span>N° Identificador:</span><?php echo $pokemonEncontrado["numero_identificador"];?></h5>
            <h5><span>Id:</span> <?php echo $pokemonEncontrado["id_pokemon"];?></h5>
        </div>
        <div class="contenedor_descripcion_pokemon">
            <p><?php echo $pokemonEncontrado["descripcion"];?></p>
        </div>
    </main>
<?php } ?>


<?php require_once("footer.php")?>
</body>
</html>