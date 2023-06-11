<?php
include 'php/coches/creaTuCoche.php';
$controlPermiso = 1;
include 'php/users/redirect.php';

?>
<head>
    <link rel="stylesheet" href= "styles/styles.css">
    <link rel="stylesheet" href= "styles/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Añade tu Coche</title>
    <link rel="icon" type="image/png" href="img/logos/logoCerroPark.png" sizes="64x64">
    <link rel="icon" href="img/logos/logoCerroParkCircle.png" type="image/png" sizes="192x192">
</head>
    <body>
    <?php
    include 'includes/nav.php';
    ?>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header><strong>Añade tu Coche</strong></header>
                <span class="error-message"><?php echo $maximoCoches; ?></span><br><br>
                <form method="POST" action="creaTuCoche.php">
                <div class="field input-field">
                        <input type="text" name="marca" placeholder="Marca" class="input" value="<?php echo isset($_POST['marca']) ? $_POST['marca'] : ''; ?>" required>
                    </div>

                    <div class="field input-field">
                        <input type="text" name="modelo" placeholder="Modelo" class="input" value="<?php echo isset($_POST['modelo']) ? $_POST['modelo'] : ''; ?>" required>
                    </div>

                    <div class="field input-field">
                        <input type="text" name="matricula" placeholder="Matricula" class="input" pattern="[A-Z0-9]+" value="<?php echo isset($_POST['matricula']) ? $_POST['matricula'] : ''; ?>" minlength="7" maxlength="12" required>
                        <span class="error-message"><?php echo $matriculaNoValida; ?></span><br><br>
                    </div>
                    
                    <div class="field input-field">
                        <label for="paisDeMatricula">Seleccione el país de su vehiculo</label>
                        <select name="paisDeMatricula" class="input" required>    
                            <optgroup label="Europa">
                                <option value='D'>Alemania<option>                  
                                <option value='A'>Austria<option>
                                <option value='B'>Bélgica<option>
                                <option value='CZ'>Chequia<option>
                                <option value='CY'>Chipre<option>
                                <option value='HR'>Croacia<option>
                                <option value='DK'>Dinamarca<option>
                                <option value='SK'>Eslovaquia<option>
                                <option value='SLO'>Eslovenia<option>
                                <option value='E' selected>España<option>
                                <option value='EST'>Estonia<option>
                                <option value='FIN'>Finlandia<option>
                                <option value='F'>Francia<option>
                                <option value='GR'>Grecia<option>
                                <option value='H'>Hungría<option>
                                <option value='IRL'>Irlandia<option>
                                <option value='I'>Italia<option>
                                <option value='LV'>Letonia<option>
                                <option value='LT'>Lituania<option>
                                <option value='L'>Luxemburgo<option>
                                <option value='M'>Malta<option>
                                <option value='NL'>Países Bajos<option>
                                <option value='PL'>Polonia<option>
                                <option value='P'>Portugal<option>
                                <option value='RO'>Rumanía<option>
                                <option value='S'>Suecia<option>
                            </optgroup>              
                        </select>
                    </div>
                 
                    <div class="field input-field">
                        <label for="cocheTemporal">¿Es un coche temporal?</label>
                        <input type="checkbox" name="cocheTemporal" placeholder="Matricula" class="input" onclick="eliminaFecha(this)">
                        <input type="hidden" id="valorTemporal" name="cocheTemporal" value="0">
                    </div>

                    <div class="field input-field" id="validoHasta">
                        <label for="validoHasta">Ultima fecha de validez (maximo un año)</label>
                        <input type="date" name="validoHasta" placeholder="Fecha de Alta" class="input" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+1 year')); ?>">
                    </div>

                    <div class="field button-field">
                        <button type="submit">
                            Añadir</button>
                    </div>
            </form>
            <script src="scripts/cocheTemporal.js"></script>
            
        </div>
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