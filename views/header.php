<?php
$nombre = "";
$estaLogeado = isset($_SESSION["usuario"]);
if ($estaLogeado) {
    $nombre = strtoupper($_SESSION["usuario"]);
}
?>
<header style="background-color: #ffffff; padding: .7em 2em;">
    <nav style="height: 100%; display: flex; justify-content: space-between; align-items: center;">
        <img src="/TP-Pokedex/assets/icons/pokemon-logo.svg" style="width: 120px;">
        <?php
        if (!$estaLogeado) { ?>
            <a href="/TP-Pokedex/views/login.php" style="background-color: #ff6f00; border: none; color: white; font-weight: bold; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-decoration: none; border-radius: 3px; padding: .5em 15px; margin: .75em 0;">Iniciar Sesión</a>
        <?php } else { ?>
            <p style="font-family: 'Open Sans', 'DejaVu Sans', sans-serif; font-weight: bold; color: #00796b; display: flex; align-items: center; gap: 10px">
                Usuario: <?php echo $nombre; ?>
                <a href="/TP-Pokedex/controller/controllerLogOut.php"><img src="/TP-Pokedex/assets/icons/icon_logout.svg" alt="Cerrar sesión" title="Cerrar sesión"></a>
            </p>
        <?php } ?>
    </nav>
</header>
