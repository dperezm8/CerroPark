<div class="contenedornav">
        <div class="logonav">
            <div class="imagennav">
                <img src="img/logos/escudoDiocesis.png" width="450px">
            </div>
        </div>
        <div class="menu">
            <div class="menu1" href="index.php">
                <a href="index.php">Inicio</a>
            </div>

            <?php
            session_start();
            if (!isset($_SESSION['idUsuario']))
            ?>

            <div class="menu2">
                <a href="catalogo.php">Registro</a>
            </div>
            <div class="menu3">
                <a href="galeria.php">Login</a>
            </div>
            <div class="menu4">
                <a href="servicios.php">Servicios</a>
            </div>
        </div>
    </div>