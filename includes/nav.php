<?php
include 'php/db.php'; // Include the database connection file
require 'php/users/login.php';

// Fetch user information from the database if logged in
?>
<nav class="navbar">
    <div class="logonav">
        <div class="imagennav">
            <img src="img/logos/escudoDiocesis.png" width="150px">
        </div>
    </div>
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
            <?php
            if (isset($_SESSION['email'])) {
                $email = $_SESSION['email'];

                // Query the database to get user details
                $query = "SELECT first_name, last_name, email, permiso FROM users WHERE email = '$email'";
                $result = mysqli_query($conn, $query);

                // Check if user exists
                if (mysqli_num_rows($result) > 0) {
                    
                    $row = mysqli_fetch_assoc($result);
                    $firstName = $row['first_name'];
                    $lastName = $row['last_name'];
                    $email = $row['email'];
                    $permiso = $row['permiso'];

                    // Set the title with user information
                    $titulo;
                    if ($permiso == 2) {
                        $titulo = 'Administrador(a)';
                    } else if ($permiso == 3) {
                        $titulo = 'Oficial';
                    } else {
                        $titulo = '';
                    }
                    $title = "Hola, $titulo $firstName $lastName";
                    echo "<li><a href='index'>" . $title . "</a></li>";
                    if ($permiso == 2) {
                        echo "<li><a href='usersInfo'>Control de Usuarios</a></li>";
                        echo "<li><a href='cochesInfo'>Control de Coches</a></li>";
                    } else if ($permiso == 1) {
                        echo "<li><a href='creaTuCoche'>Añade tu Coche</a></li>";
                        echo "<li><a href='misCoches'>Mis Coches</a></li>";
                    } else {
                        
                    }
                        echo "<li><a href='logout'>Cierra Sesión</a></li>";

                    

                } else {
                    $title = "Inicio";
                    echo "<li><a href='index'>" . $title . "</a></li>" .
                         "<li><a href='register'>Crea tu Usuario</a></li>" .
                         "<li><a href='login'>Inicia Sesión</a></li>";
                }
            } else {
                $title = "Inicio";
                echo "<li><a href='index'>" . $title . "</a></li>" .
                     "<li><a href='register'>Crea tu Usuario</a></li>" .
                     "<li><a href='login'>Inicia Sesión</a></li>";
            }
            ?>
        </ul>
    </div>
</nav>
<script src="scripts/hamburguer.js"></script>