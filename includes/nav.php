<?php
include 'php/users/login.php';
include 'php/db.php'; // Include the database connection file

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
                        $titulo = 'Administrador';
                    } else if ($permiso == 3) {
                        $titulo = 'Oficial';
                    } else {
                        $titulo = '';
                    }
                    $title = "Hola, $titulo $firstName $lastName";
                    echo "<li><a href='index.php'>" . $title . "</a></li>";
                    if ($permiso == 2) {
                        echo "<li><a href='usersInfo.php'>Menu Admin</a></li>";
                    } else if ($permiso == 3) {

                    } else {
                        echo "<li><a href='creaTuCoche.php'>Añade tu Coche</a></li>";
                    }
                        echo "<li><a href='logout.php'>Cierra Sesión</a></li>";

                    

                } else {
                    $title = "Inicio";
                    echo "<li><a href='index.php'>" . $title . "</a></li>" .
                         "<li><a href='register.php'>Crea tu Usuario</a></li>" .
                         "<li><a href='login.php'>Inicia Sesión</a></li>";
                }
            } else {
                $title = "Inicio";
                echo "<li><a href='index.php'>" . $title . "</a></li>" .
                     "<li><a href='register.php'>Crea tu Usuario</a></li>" .
                     "<li><a href='login.php'>Inicia Sesión</a></li>";
            }
            ?>
        </ul>
    </div>
</nav>