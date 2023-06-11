<?php
include 'php/coches/miCoche.php';
$controlPermiso = 1;
include 'php/users/redirect.php';


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
    <title>Mis Coches</title>
    <link rel="icon" type="image/png" href="img/logos/logoCerroPark.png" sizes="64x64">
    <link rel="icon" href="img/logos/logoCerroParkCircle.png" type="image/png" sizes="192x192">
</head>
<body>
<?php
include 'includes/nav.php';
?>
<h1>Mis Coches</h1>
<section class="container forms">
    
    <div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Matricula</th>
                <th>Codigo de pais</th>
                <th>Fecha de Alta</th>
                <th>¿Es temporal?</th>
                <th>Valido hasta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($coches as $coche): 
                if($coche['deBaja'] == 0) { ?>
                <tr>
                    <td><?php echo $coche['marca']; ?></td>
                    <td><?php echo $coche['modelo']; ?></td>
                    <td><?php echo $coche['matricula']; ?></td>
                    <td><?php echo $coche['paisDeMatricula']; ?></td>
                    <td><?php echo $coche['fechaAlta']; ?></td>
                    <td>
                        <?php
                        if ($coche['cocheTemporal'] == 1) {
                            echo 'Si';
                        } else if ($coche['cocheTemporal'] == 0) {
                            echo 'No';
                        }; ?>
                    </td>
                    <td><?php echo $coche['validoHasta']; ?></td>
                    
                    <td>
                        <form method="post">
                            <input type="hidden" name="carId" value="<?php echo $coche['idCoches']; ?>">
                            <input type="hidden" name="baja" value="1">
                            <input type="hidden" name="bajaDate" value="<?php echo date('Y-m-d'); ?>">
                            <button type="submit" name="darDeBaja">Dar de Baja</button>
                        </form>
                    </td>
                </tr>
            <?php } endforeach; ?>
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