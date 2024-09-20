<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/TP-Pokedex/styles/home.css">
    <title>Inicio | Pokedex</title>
</head>
<body>
    <?php require_once("views/header.php")?>


    <main>
        <form class="form_buscador">
            <input type="text" placeholder="Ingrese el nombre, tipo o número de pokemon">
            <input type="submit" value="Buscar" class="btn">
        </form>


        <div class="table-container">
            <table>
                <thead>
                <tr>
                    <th class="col1">Pokemon</th>
                    <th class="col2">Tipo</th>
                    <th class="col3">N°</th>
                    <th class="col4">Nombre</th>
                    <?php
                    $admin = false;

                    if($admin){?>
                        <th class="">Acciones</th> <!-- ACA HAY Q PONER LO DE SI EL ADMIN ES TRU O FALSE-->
                    <?php }?>
                </tr>
                </thead>
                <tbody>
                <tr class="fila_de_pokemon">
                    <td class="col1"><img src="/TP-Pokedex/assets/pokemones/Bayleef.webp" alt="Imagen" class="img_poke"></td>
                    <td class="col2"><img src="/TP-Pokedex/assets/tipos/planta.avif" alt="Imagen" class="img_tipo"></td>
                    <td class="col3">1</td>
                    <td class="col4">Bayleef</td>
                    <?php if($admin){?>
                        <td class="col5">
                            <div>
                                <a href="#" class="btn_editar"> <img src="assets/icons/icon_edit.svg">Editar</a>
                                <a href="#" class="btn_eliminar"> <img src="assets/icons/icon_delete.svg">Eliminar</a>
                            </div>
                        </td> <!-- ACA HAY Q PONER LO DE SI EL ADMIN ES TRU O FALSE y los link a la pag editar con el id del pokemon-->
                    <?php }?>
                </tr>

                </tbody>
            </table>
        </div>

        <button class="btn-new-pokemon">
            <a href="#">Nuevo pokemon</a>
        </button>
    </main>


    <?php require_once("views/footer.php")?>
</body>
</html>
