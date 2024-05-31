<style>

    header {
        display: flex;
        flex-direction: row;
        gap: 30px;
        justify-content: center;
        align-items: center;
    }

    header > h1 {
        font-size: 24px;
    }

    nav {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    header a:link, header a:visited {
        background-color: #f2f2f2;
        color: #333333;
        padding: 6px 12px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        border: 1px solid #d5d5d5;
        border-radius: 6px;
    }

    header a:hover, header a:active {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }
</style>

<header>
    <h1>Blog Khalid</h1>
    <nav>
        <a href="index.php">Inicio</a>
    </nav>
    <?php if (isset($_SESSION['usuari'])): ?>
        <a href="index.php?controller=usuari&action=logout">Cerrar sesión</a></p>
        <p>Bienvenido, <?php echo $_SESSION['usuari']; ?>
    <?php else: ?>
        <a href="index.php?controller=usuari&action=login">Iniciar sesión</a>
        <a href="index.php?controller=usuari&action=register">Registrarse</a>
    <?php endif; ?>

    <code>(selector idiomes)</code>
</header>