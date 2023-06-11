<?php
include 'php/coches/Coche.php';
$controlPermiso = 2;
include 'php/users/redirect.php';
$variableBusqueda1 = 'matricula';
$variableBusqueda2 = 'marca';
$variableBusqueda3 = 'idUsuarioCoche';
$mezclaVariable = "CONCAT(marca, ' ', modelo)";
$tabla = 'coches';
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
    <title>Información de Coches</title>
    <link rel="icon" type="image/png" href="img/logos/logoCerroPark.png" sizes="64x64">
    <link rel="icon" href="img/logos/logoCerroParkCircle.png" type="image/png" sizes="192x192">

</head>
<body>
<?php
include 'includes/nav.php';
?>
<h1>Información de Coches</h1>

<section class="container forms"> 
    <div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Matricula</th>
                <th>Fecha de Alta</th>
                <th>¿Es temporal?</th>
                <th>Valido hasta</th>
                <th>¿Está de baja?</th>
                <th>Fecha de baja</th>
                <th>Id de Usuario creador (Dueño)</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($coches as $coche): ?>
        <tr>
            <td><?php echo $coche['idCoches']; ?></td>
            <td><?php echo $coche['marca']; ?></td>
            <td><?php echo $coche['modelo']; ?></td>
            <td><?php echo $coche['matricula']; ?></td>
            <td><?php echo $coche['fechaAlta']; ?></td>
            <td><?php if ($coche['cocheTemporal'] == 1) {
                echo 'Si';
                } else {
                    echo 'No';
                } ?>
                </td>
            <td><?php echo $coche['validoHasta']; ?></td>
            <td>
                <?php if ($coche['deBaja'] == 1) {
                echo 'Si';
                } else {
                    echo 'No';
                } ?></td>
            <td><?php echo $coche['fechaBaja']; ?></td>
            <td><?php echo $coche['idUsuarioCoche']; ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="cocheId" value="<?php echo $coche['idCoches']; ?>">
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