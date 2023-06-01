<?php
include 'php/users/Usuario.php';
$controlPermiso = 2;
include 'php/users/redirect.php';
$variableBusqueda1 = 'email';
$variableBusqueda2 = 'first_name';
$variableBusqueda3 = 'last_name';
$mezclaVariable = "CONCAT(first_name, ' ', last_name)";
include 'php/searchBar.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
</head>
<body>
<?php
include 'includes/nav.php';
?>
    <h1>User Information</h1>

    
    
    <form method="POST">
        
        <input type="text" name="searchBar" id="searchBar" placeholder="Nombre, apellido o email">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Control de Administrador</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['first_name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php if ($user['permiso'] == 1) {
                                echo 'Usuario';
                                } else if ($user['permiso'] == 2) {
                                    echo 'Administrador';
                                } else if ($user['permiso'] == 3) {
                                    echo 'Policia';
                                }; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="userId" value="<?php echo $user['id']; ?>">
                            <input type="text" name="firstName" value="<?php echo $user['first_name']; ?>">
                            <input type="text" name="lastName" value="<?php echo $user['last_name']; ?>">
                            <input type="text" name="email" value="<?php echo $user['email']; ?>">
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
<?php
include 'includes/footer.php';
?>

</body>
</html>