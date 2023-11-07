<?php include_once('../0/components/elements-l2.php'); ?>
<?php include('../1/crud.php'); ?>

<div class="show-query">
    <h2>Consultas</h2>
    <hr>
    
    <form action="" method="post" accept-charset="utf-8">

        <h5>Elije una opción</h5>

        <div class="col-12">
            <label class="form-label" for="aprendices">Aprendices por ficha</label>
            <select class="form-select" name="aprendices" id="aprendices" required>
                <option value="" style="display: none" disable>Selecciona una opción</option>
                <?php
                // conecta a la base de datos
                conectar();
                // consulta
                $query = "SELECT ficha.codigo, nombre FROM ficha
                    INNER JOIN programa ON ficha.COD_PROGRAMA = programa.codigo
                    ORDER BY nombre;";
                // almacena el resultado de ejecutar la consulta
                $result = $link -> query($query);

                if($result -> num_rows > 0) {
                    // corre hasta que no hayan más filas para leer
                    while($row = $result -> fetch_assoc()) {
                        echo '
                        <option value="'.$row['codigo'].'">'.$row['codigo'].' - '.$row['nombre'].'</option>
                        ';
                    }
                }
                ?>
            </select>
        </div>
        <div style="justify-content: center; display: flex;">
            <button class="button-submit" type="submit" name="consultar" value="1" style="max-width: 150px; width: 50%; margin-top: 5px;">Consultar</button>
        </div>
    </form>

    <form action="" method="post" accept-charset="utf-8">
        <div class="col-12">
            <label class="form-label" for="ficha">Fichas de un programa</label>
            <select class="form-select" name="ficha" id="ficha" required>
                <option value="" style="display: none" disable>Selecciona una opción</option>
                    <?php
                    $query = "SELECT codigo, nombre FROM programa
                    ORDER BY nombre;";
                    // almacena el resultado de ejecutar la consulta
                    $result = $link -> query($query);

                    if($result -> num_rows > 0) {
                        // corre hasta que no hayan más filas para leer
                        while($row = $result -> fetch_assoc()) {
                            echo '
                            <option value="'.$row['codigo'].'">'.$row['codigo'].' - '.$row['nombre'].'</option>
                            ';
                        }
                    }
                    ?>
            </select>
        </div>
        <div style="justify-content: center; display: flex;">
            <button class="button-submit" type="submit" name="consultar" value="2" style="max-width: 150px; width: 50%; margin-top: 5px;">Consultar</button>
        </div>
    </form>

    <form action="" method="post" accept-charset="utf-8">
        <div class="col-12">
            <label class="form-label" for="ambiente">Historial de préstamo</label>
            <select class="form-select" name="ambiente" id="ambiente" required>
                <option value="" style="display: none" disable>Selecciona una opción</option>
                    <?php
                    $query = "SELECT ambiente.codigo, ambiente, sede.nombre AS sede FROM FICHA_AMBIENTE
                    INNER JOIN ficha ON FICHA_AMBIENTE.COD_FICHA = ficha.codigo
                    INNER JOIN ambiente ON FICHA_AMBIENTE.COD_AMBIENTE = ambiente.codigo
                    INNER JOIN sede ON ambiente.COD_SEDE = sede.codigo
                    GROUP BY ambiente;";
                    // almacena el resultado de ejecutar la consulta
                    $result = $link -> query($query);

                    if($result -> num_rows > 0) {
                        // corre hasta que no hayan más filas para leer
                        while($row = $result -> fetch_assoc()) {
                            echo '
                            <option value="'.$row['codigo'].'">'.$row['ambiente'].' - '.$row['sede'].'</option>
                            ';
                        }
                    }
                    ?>
            </select>
        </div>
        <div style="justify-content: center; display: flex;">
            <button class="button-submit" type="submit" name="consultar" value="3" style="max-width: 150px; width: 50%; margin-top: 5px;">Consultar</button>
        </div>
    </form>

    <?php
    if(isset($_POST['consultar'])) {
        $respuesta = $_POST['consultar'];
        switch($respuesta) {
            case "1":
                // consulta
                $query = "SELECT COD_FICHA, documento,
                CONCAT(nombre, ' ', apellido1, ' ', apellido2) AS nombre,
                APRENDIZ_FICHA.estado FROM aprendiz
                INNER JOIN APRENDIZ_FICHA ON aprendiz.documento = APRENDIZ_FICHA.ID_APRENDIZ
                WHERE COD_FICHA = ".$_POST['aprendices']."
                ORDER BY nombre;";

                // almacena el resultado de ejecutar la consulta
                $result = $link -> query($query);
                if($result -> num_rows > 0) {
                echo '
                <b>CONSULTA '.$respuesta.': Aprendices de la ficha "'.$_POST['aprendices'].'"</b><br><br>
                <table class="table-query">
                <tr>
                    <th>DOCUMENTO</th>
                    <th>NOMBRE</th>
                    <th>ESTADO</th>
                </tr>
                ';
                    // corre hasta que no hayan más filas para leer
                    while($row = $result -> fetch_assoc()) {
                        echo '
                        <tr>
                            <td class="center">'.$row['documento'].'</td>
                            <td>'.$row['nombre'].'</td>
                            <td class="center">'.$row['estado'].'</td>
                        </tr>
                        ';
                    }
                echo '
                </table>';

                } else {
                echo '
                <br>No se encontraron registros.';
                }
                break;
            case "2":
                // consulta
                $query = "SELECT ficha.codigo, programa.nombre, ficha.f_inicio_lectiva, ficha.f_fin_lectiva, ficha.f_terminacion FROM ficha
                INNER JOIN programa ON ficha.COD_PROGRAMA = programa.codigo
                WHERE programa.codigo = ".$_POST['ficha'];

                // almacena el resultado de ejecutar la consulta
                $result = $link -> query($query);
                if($result -> num_rows > 0) {
                echo '
                <b>CONSULTA '.$respuesta.': Fichas del programa "'.$_POST['ficha'].'"</b><br><br>
                <table class="table-query">
                <tr>
                    <th>CÓDIGO</th>
                    <th>NOMBRE</th>
                    <th>INICIO<br>LECTIVA</th>
                    <th>FIN<br>LECTIVA</th>
                    <th>FIN<br>FICHA</th>
                </tr>
                ';
                    // corre hasta que no hayan más filas para leer
                    while($row = $result -> fetch_assoc()) {
                        echo '
                        <tr>
                            <td class="center">'.$row['codigo'].'</td>
                            <td>'.$row['nombre'].'</td>
                            <td class="center">'.$row['f_inicio_lectiva'].'</td>
                            <td class="center">'.$row['f_fin_lectiva'].'</td>
                            <td class="center">'.$row['f_terminacion'].'</td>
                        </tr>
                        ';
                    }
                echo '
                </table>';

                } else {
                echo '
                <br>No se encontraron registros.';
                }
                break;
            case "3":

                // consulta  
                $query = 'SELECT ficha.codigo, programa.nombre, FICHA_AMBIENTE.f_inicio,
                FICHA_AMBIENTE.f_fin, FICHA_AMBIENTE.h_entrada, FICHA_AMBIENTE.h_salida FROM ficha
                INNER JOIN programa ON ficha.COD_PROGRAMA = programa.codigo
                INNER JOIN FICHA_AMBIENTE ON ficha.codigo = FICHA_AMBIENTE.COD_FICHA
                WHERE FICHA_AMBIENTE.COD_AMBIENTE = '.$_POST['ambiente'];

                // almacena el resultado de ejecutar la consulta
                $result = $link -> query($query);
                if($result -> num_rows > 0) {
                echo '
                <b>CONSULTA '.$respuesta.': Préstamo del salón "'.$_POST['ambiente'].'"</b><br><br>
                <table class="table-query">
                <tr>
                    <th>FICHA</th>
                    <th>NOMBRE</th>
                    <th>F. INICIO</th>
                    <th>F. FIN</th>
                    <th>ENTRADA</th>
                    <th>SALIDA</th>
                </tr>
                ';
                    // corre hasta que no hayan más filas para leer
                    while($row = $result -> fetch_assoc()) {
                        echo '
                        <tr>
                            <td class="center">'.$row['codigo'].'</td>
                            <td>'.$row['nombre'].'</td>
                            <td class="center">'.$row['f_inicio'].'</td>
                            <td class="center">'.$row['f_fin'].'</td>
                            <td class="center">'.$row['h_entrada'].'</td>
                            <td class="center">'.$row['h_salida'].'</td>
                        </tr>
                        ';
                    }
                echo '
                </table>';
                } else {
                echo '
                <br>No se encontraron registros.';
                }
                break;
            default:
                echo 'Ups, algo salió mal. :(';
        };
        $link -> close();
    };
    ?>
</div>

<?php include('../0/components/footer.php'); ?>
