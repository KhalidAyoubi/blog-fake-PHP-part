<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
</head>
<body>
<header>
    <h1>Blog</h1>
    <?php if (isset($_SESSION['usuari'])): ?>
        <p>Bienvenido, <?php echo $_SESSION['usuari']; ?> <a href="index.php?controller=user&action=logout">Cerrar sesión</a></p>
    <?php else: ?>
        <a href="index.php?controller=user&action=login">Iniciar sesión</a> | <a href="index.php?controller=user&action=register">Registrarse</a>
    <?php endif; ?>
    <nav>
        <a href="index.php?controller=post&action=index">Inicio</a>
    </nav>
</header>
<main>
    <?php include($view); ?>
</main>
</body>
</html>
