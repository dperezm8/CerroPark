<?php
include 'php/users/Usuario.php';
$controlPermiso = 2;
include 'php/users/redirect.php';
$variableBusqueda1 = 'email';
$variableBusqueda2 = 'first_name';
$variableBusqueda3 = 'last_name';
$mezclaVariable = "CONCAT(first_name, ' ', last_name)";
$tabla = 'users';
include 'php/searchBar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/tables.css">
    <link rel="stylesheet" href="styles/box.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Control Usuarios</title>
    <link rel="icon" type="image/png" href="img/logos/logoCerroPark.png" sizes="64x64">
    <link rel="icon" href="img/logos/logoCerroParkCircle.png" type="image/png" sizes="192x192">
</head>
<body>
<?php
include 'includes/nav.php';
?>
<h1>Información de Usuarios</h1>
    
    <form method="POST">
        <input type="text" name="searchBar" id="searchBar" placeholder="Nombre, apellido o email" value="<?php echo isset($searchBar) ? $searchBar : ''; ?>">
        <button type="submit">Search</button>
    </form>
<section class="container forms">

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Control de Administrador</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?=$user['id']?></td>
                        <td><?=$user['first_name']?></td>
                        <td><?=$user['last_name']?></td>
                        <td><?=$user['email']?></td>
                    </div>
                    <td>
                        <form method="post">
                        <input type="hidden" name="userId" value="<?php echo $user['id']; ?>">
                            <select name="permiso">
                                <option hidden></option>
                                <option value="1" <?php echo ($user['permiso'] == 1) ? 'selected' : ''; ?>>Usuario</option>
                                <option value="2" <?php echo ($user['permiso'] == 2) ? 'selected' : ''; ?>>Administrador</option>
                                <option value="3" <?php echo ($user['permiso'] == 3) ? 'selected' : ''; ?>>Policia</option>
                            </select>
                            <button type="submit" name="update">Editar</button>
                            <button type="submit" name="delete">Borrar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?php
include 'includes/footer.php';
?>

</body>
</html>
<!--
    
Web administrativa para el Cerro de Los Angeles
Creada por ʕ•ᴥ•ʔ Diego Pérez ʕ•ᴥ•ʔ

-->