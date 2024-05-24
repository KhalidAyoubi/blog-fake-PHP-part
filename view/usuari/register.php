<?php
    @include ("view/header.php");
?>

<h1>Registro</h1>
<form action="index.php?controller=usuari&action=register" method="POST">
    <label for="username">Usuario:</label>
    <input id="username" type="text" name="username" required>

    <label for="password">Contraseña:</label>
    <input id="password" type="password" name="password" required>

    <label for="email">Correo:</label>
    <input id="email" type="email" name="email" required>

    <label for="nom">Nombre:</label>
    <input id="nom" type="text" name="nom" required>

    <label for="cognoms">Apellidos:</label>
    <input id="cognoms" type="text" name="cognoms" required>

    <button type="submit">Registrarse</button>
</form>