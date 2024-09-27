
<?php
session_start();
$estaLogeado = false;

if (isset($_SESSION['usuario'])){
    $estaLogeado = true;
}

$pokemon = [
'imagen' => '/imagenes/charmander.png',  // Ruta de la imagen del Pokémon
'nombre' => 'Charmander',
'tipo' => 'Fuego',
'descripcion' => 'Charmander es un Pokémon tipo Fuego. Su cola arde constantemente. Si se apaga, se debilita.'
];
?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/TP-Pokedex/styles/detallePokemon.css">
    <link rel="icon" href="/TP-Pokedex/assets/icons/pokemon-logo.svg">
    <title>Detalle Pokemon | Pokedex</title>
</head>
<body>
    <?php require_once("header.php")?>


    <main>
        <section class="contenedor_general">
            <section class="detalle-pokemon">
                <!-- Sección de la imagen del Pokémon -->
                <div class="imagen-pokemon">
                    <img src="<?php echo $pokemon['imagen']; ?>" alt="Imagen de <?php echo $pokemon['nombre']; ?>">
                </div>

                <!-- Sección de detalles del Pokémon -->
                <div class="info-pokemon">
                    <p><strong>Nombre:</strong> <?php echo $pokemon['nombre']; ?></p>
                    <p><strong>Tipo:</strong> <?php echo $pokemon['tipo']; ?></p>
                    <p><strong>Descripción:</strong> <?php echo $pokemon['descripcion']; ?></p>
                </div>
            </section>
        </section>

    </main>


    <?php require_once("footer.php")?>
</body>
</html>
