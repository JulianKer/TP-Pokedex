<?php
$nombre = "";
$estaLogeado = isset($_SESSION["usuario"]);
if ($estaLogeado) {
    $nombre = $_SESSION["usuario"];
}
?>

<style>

    header{
        background-color: #fff;
        padding: .7em 5em;
        position: sticky;
        top: 0px;
        z-index: 5;
    }

    @media screen and (max-width: 700px){
        header{
            padding: .7em 1em;
        }
    }

</style>

<header id="arriba">
    <nav style="height: 100%; display: flex; justify-content: space-between; align-items: center;">
        <a href="/TP-Pokedex/index.php">  <img src="/TP-Pokedex/assets/icons/pokemon-logo.svg" style="width: 120px;"></a>
        <?php
        if (!$estaLogeado) { ?>
            <a href="/TP-Pokedex/views/login.php" style="background-color: #ff6f00; border: none; color: white; font-weight: bold; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-decoration: none; border-radius: 3px; padding: .5em 15px; margin: .75em 0;">Iniciar Sesión</a>
        <?php } else { ?>
            <p style="font-family: 'Open Sans', 'DejaVu Sans', sans-serif; font-weight: bold; color: #00796b; display: flex; align-items: center; gap: 10px; margin:0">
                ADMIN: <?php echo $nombre; ?>
                <a href="/TP-Pokedex/controller/controllerLogOut.php" id="logoCerrarSesion"><img src="/TP-Pokedex/assets/icons/icon_logout.svg" alt="Cerrar sesión" title="Cerrar sesión"></a>
            </p>
        <?php } ?>
    </nav>
</header>
