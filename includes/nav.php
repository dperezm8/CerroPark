<nav class="navbar">
    <div class="logonav">
        <div class="imagennav">
            <img src="img/logos/escudoDiocesis.png" width="150px">
        </div>
    </div>
    <?php if (isset($email)) { ?>
        <img src="<?php echo $picture_url; ?>" width="20px">
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class=""></span>
            <span class="bar"></span>
            <span class=""></span>
            <span class="bar"></span>
            <span class=""></span>
        </a>
        <div class="navbar-links">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="logout.php">Cerrar Sesion</a></li>
                <li><a href="#">Añadir coche</a></li>
            </ul>
        </div>
    <?php } else { ?>
        <div class="navbar-links">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    <?php } ?>
</nav>