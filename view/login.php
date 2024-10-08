<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../asset/login.css">


    <script src="https://kit.fontawesome.com/03a89292db.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <h2>Iniciar sesión</h2>
        <form method="POST" action="" class="form">
            <div class="form__usuario">
                <label for="username">Usuario:</label>
                <input type="text" name="username" class="usuario" required>
            </div>
            <div class="form__clave">
                <label for="password">Contraseña:</label>
                <input id="clave" type="password" name="password" class="clave" required>
                <span id="ver" class="ver_clave" onclick="togglePassword()"><i id="icono" class="fas fa-eye"></i></span>
            </div>
            <div class="form__boton">
                <button type="submit" class="boton">Iniciar sesión</button>
            </div>
        </form>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('clave');
            const icon = document.getElementById('icono');
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
