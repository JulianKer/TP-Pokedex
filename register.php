<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - Pokedex</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/TP-Pokedex/styles/register.css">
</head>
<body>

<div class="register-container">
    <div class="register-header">
        <img src="https://upload.wikimedia.org/wikipedia/commons/9/98/International_Pokémon_logo.svg" alt="Pokémon Logo">
        <h1>Registrarse</h1>
    </div>
    <form>
        <div class="mb-3">
            <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
        </div>
        <div class="mb-3">
            <input type="email" class="form-control" id="email" placeholder="Correo" required>
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" id="contrasena" placeholder="Contraseña" required>
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" id="confirmarContrasena" placeholder="Confirmar contraseña" required>
        </div>
        <button type="submit" class="btn btn-register btn-block w-100">Registrarse</button>
    </form>
    <p class="mt-3">¿Ya tienes una cuenta? <a href="/TP-Pokedex/login.php" class="link-login">Inicia sesión</a></p>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
