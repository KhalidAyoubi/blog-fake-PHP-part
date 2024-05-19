<header>
    <h1>Blog</h1>
    <?php if (isset($_SESSION['usuari'])): ?>
        <p>Bienvenido, <?php echo $_SESSION['usuari']; ?> <a href="index.php?controller=usuari&action=logout">Cerrar sesión</a></p>
    <?php else: ?>
        <a href="index.php?controller=usuari&action=login">Iniciar sesión</a> | <a href="index.php?controller=usuari&action=register">Registrarse</a>
    <?php endif; ?>
    <nav>
        <a href="index.php">Inicio</a>
    </nav>
</header>