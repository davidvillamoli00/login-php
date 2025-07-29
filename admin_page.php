<?php

session_start();
if(!isset($_SESSION['email'])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin  Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body   style="background:#fff;">
        <div class="box">
        <h1>¡Bienvenido <span><?= $_SESSION['name']; ?></span>!</h1>
        <p>esto es la pagina de <span>administradore s!</span></p>
        <button   onclick="window.location.href='logout.php'">Cerrar Sesion</button>
    </div>
</body>
</html>