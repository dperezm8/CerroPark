<head>
    <link rel="stylesheet" href= "styles/styles.css">
    <link rel="stylesheet" href= "styles/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts/hamburguer.js" defer></script>
    <script src="scripts/login.js"></script>
    <title>Añade tu Coche</title>
    <style>
        
.error-message {
    display: block;
    margin-top: 5px;
    color: rgb(255, 46, 54);
}
    </style>
</head>
    <body>
    <?php
    include 'includes/nav.php';
    ?>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header><strong>Añade tu Coche</strong></header>
                <form method="POST" action="register.php">
                <div class="field input-field">
                        <input type="text" name="marca" placeholder="Marca" class="input" required>
                    </div>
                    <div class="field input-field">
                        <input type="text" name="modelo" placeholder="Modelo" class="input" required>
                    </div>
                    <div class="field input-field">
                        <input type="text" name="matricula" placeholder="Matricula" class="input" required>
                    </div>
                    <div class="field input-field">
                        <label for="paisDeMatricula">Pais del Vehiculo</label>
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

                    <div class="field button-field">
                        <button type="submit">
                            Añadir</button>
                    </div>
            </form>
        </div>
    </div>
</section>
<?php
include 'includes/footer.php';
?>
</body>
</html>