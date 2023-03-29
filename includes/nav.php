<nav class="navbar">
        <div class="logonav">
            <div class="imagennav">
                <img src="img/logos/escudoDiocesis.png" width="150px">
            </div>
        </div>
        <a href="#" class="menuHamburguesa">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="opcionesMenu">
            <ul>
                <li><a href="index.php">Inicio</a></li>

            <?php
            session_start();
            if (!isset($_SESSION['idUsuario']))
            ?>

                <li><a href="catalogo.php">Registro</a></li>
                <li><a href="galeria.php">Login</a></li>
                <li><a href="servicios.php">Servicios</a></li>
            </ul>
        </div>
</nav>