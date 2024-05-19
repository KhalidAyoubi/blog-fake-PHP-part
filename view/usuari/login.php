<?php
    @include ("view/header.php");
?>
<h1>Iniciar sesión</h1>
<form action="index.php?controller=usuari&action=login" method="POST">
    <label for="username">Usuario:</label>
    <input type="text" name="username" required>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" required>
    <button type="submit">Iniciar sesión</button>
</form>
