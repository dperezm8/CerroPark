<div class="navbar">
        <div class="logonav">
            <div class="imagennav">
                <img src="img/logos/escudoDiocesis.png" width="450px">
            </div>
        </div>
        <div class="navbar-links">
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
</div>