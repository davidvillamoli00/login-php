<?php
session_start();

// Obtener errores de sesión
$error = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];

// Control del formulario activo
$activeForm = $_SESSION['active_form'] ?? 'login';




// Función para mostrar errores
function showError($error) {
    return !empty($error)? "<p class='error-message'>$error</p>"
        : '';
}

// Función para activar el formulario adecuado
function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inicio de Sesión y Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

        <!-- Login Form -->
        <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
            <form action="login_register.php" method="post">
                <h2>Login</h2>
                <?= showError($error['login']); ?>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
                <p>¿No tienes una cuenta? <a href="#" onclick="showForm('register-form')">Regístrate</a></p>
            </form>
        </div>

        <!-- Register Form -->
        <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
            <form action="login_register.php" method="post">
                <h2>Register</h2>
                <?= showError($error['register']); ?>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="role" required>
                    <option value="">--Selecciona un rol--</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" name="register">Register</button>
                <p>¿Ya tienes una cuenta? <a href="#" onclick="showForm('login-form')">Login</a></p>
            </form>
        </div>

    </div>

    <script src="scrip.js"></script>
</body>
</html>
