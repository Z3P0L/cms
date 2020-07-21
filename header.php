<?php
session_start();
?>
<header>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">CMS</a>
        </div>
        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="/index.php">Home</a>
                <a class="navbar-item" href="/blog/site.php">Blog</a>
                <?php if (isset($_SESSION['login'])): ?>
                <a class="navbar-item" href="/blog/add-post.php">Escribe algo</a>
                <a class="navbar-item" href="/logout.php">Cerrar Sesion</a>
                <?php else: ?>
                <a class="navbar-item" href="/login.php">Iniciar Sesion</a>
                <a class="navbar-item" href="/register.php">Registrarse</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>