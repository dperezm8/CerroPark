<?php
include 'php/coches/Coche.php';
include 'php/users/Usuario.php';
$controlPermiso = 2;
include 'php/users/redirect.php';
$variableBusqueda1 = 'matricula';
$variableBusqueda2 = 'marca';
$variableBusqueda3 = 'idUsuarioCoche';
$mezclaVariable = '';
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
        
        <input type="text" name="searchBar" id="searchBar" placeholder="Matricula, marca, id del dueño">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Matricula</th>
                <th>Codigo de pais</th>
                <th>Fecha de Alta</th>
                <th>¿Es temporal?</th>
                <th>Valido hasta</th>
                <th>¿Está de baja?</th>
                <th>Fecha de baja</th>
                <th>Id de Usuario creador (Dueño)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($coches as $coche): ?>
                <tr>
                    <td><?php echo $coche['idCoches']; ?></td>
                    <td><?php echo $coche['marca']; ?></td>
                    <td><?php echo $coche['modelo']; ?></td>
                    <td><?php echo $coche['matricula']; ?></td>
                    <td><?php echo $coche['paisDeMatricula']; ?></td>
                    <td><?php echo $coche['fechaAlta']; ?></td>
                    <td><?php echo $coche['cocheTemporal']; ?></td>
                    <td><?php echo $coche['validoHasta']; ?></td>
                    <td><?php echo $coche['deBaja']; ?></td>
                    <td><?php echo $coche['fechaBaja']; ?></td>
                    <td><?php echo $coche['idUsuarioCoche']; ?></td>
                    
                    <td>
                        <form method="post">
                            <input type="hidden" name="cocheId" value="<?php echo $coche['idCoches']; ?>">
                            <input type="text" name="make" value="<?php echo $coche['marca']; ?>">
                            <input type="text" name="model" value="<?php echo $coche['modelo']; ?>">
                            <input type="text" name="plate" value="<?php echo $coche['matricula']; ?>">
                            <input type="text" name="paisMatricula" value="<?php echo $coche['paisDeMatricula']; ?>">
                            <input type="text" name="altaDate" value="<?php echo $coche['fechaAlta']; ?>">
                            <input type="text" name="temporal" value="<?php echo $coche['cocheTemporal']; ?>"> <!--Posiblemente poner como select de si o no -->
                            <input type="text" name="validez" value="<?php echo $coche['validoHasta']; ?>">
                            <input type="text" name="baja" value="<?php echo $coche['deBaja']; ?>"> <!--Posiblemente poner como select de si o no  -->
                            <input type="text" name="bajaDate" value="<?php echo $coche['fechaBaja']; ?>">

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