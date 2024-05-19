<?php
    @include ("view/header.php");
?>

<h1>Registro</h1>
<form action="index.php?controller=usuari&action=register" method="POST">
    <label for="username">Usuario:</label>
    <input type="text" name="username" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" required>

    <label for="email">Correo:</label>
    <input type="email" name="email" required>

    <label for="nom">Nombre:</label>
    <input type="text" name="nom" required>

    <label for="cognoms">Apellidos:</label>
    <input type="text" name="cognoms" required>

    <button type="submit">Registrarse</button>
</form>