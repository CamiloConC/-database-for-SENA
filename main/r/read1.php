<?php include_once('../0/components/elements-l2.php'); ?>
<?php include('../1/crud.php'); ?>

<div class="show-query">
    <h2>Consultas</h2>
    <hr>
    
    <form action="" method="post" accept-charset="utf-8">
    
        <p>¿Qué deseas consultar?:</p>
        <div class="col-12">
            <input type="radio" name="query" id="1" value="1" required>
            <label for="1">1. Cantidad de aprendices matriculados por ficha.</label>
        </div>

        <div class="col-12">
        <input type="radio" name="query" id="2" value="2" required>
        <label for="2">2. Estado de aprendices por ficha.</label>
        </div>

        <div class="col-12">
            <input type="radio" name="query" id="3" value="3" required>
            <label for="3">3. Estado de aprendices en fichas matriculadas.</label>
        </div>

        <div class="col-12">
            <input type="radio" name="query" id="4" value="4" required>
            <label for="4">4. Información de los programas.</label>
        </div>

        <div class="d-flex align-items-center justify-content-center">
            <button class="button-submit" type="submit" name="enviar" style="max-width: 250px; width: 50%;">Enviar</button>
        </div>
    </form>
    
    <?php
    if(isset($_POST['enviar'])) {
        conectar();
        $respuesta = $_POST['query'];

        switch($respuesta) {
            case "1":
                // consulta  
                $query = "SELECT ficha.codigo, programa.nombre, COUNT(ID_APRENDIZ) AS aprendices FROM APRENDIZ_FICHA
                INNER JOIN ficha ON APRENDIZ_FICHA.COD_FICHA = ficha.codigo
                INNER JOIN programa ON ficha.COD_PROGRAMA = programa.codigo
                GROUP BY ficha.codigo
                ORDER BY nombre;";

                // almacena el resultado de ejecutar la consulta
                $result = $link -> query($query);
                if($result -> num_rows > 0) {
                echo '
                <b>CONSULTA '.$respuesta.'</b><br><br>
                <table class="table-query">
                <tr>
                    <th>CÓDIGO</th>
                    <th>NOMBRE</th>
                    <th>APRENDICES</th>
                </tr>
                ';
                    // corre hasta que no hayan más filas para leer
                    while($row = $result -> fetch_assoc()) {
                        echo '
                        <tr>
                            <td class="center">'.$row['codigo'].'</td>
                            <td>'.$row['nombre'].'</td>
                            <td class="center">'.$row['aprendices'].'</td>
                        </tr>
                        ';
                    }
                echo '
                </table>';

                } else {
                echo '
                <br> No se encontraron registros.';
                }
                break;
            case "2":
                // consulta
                $query = "SELECT ficha.codigo, programa.nombre,
                SUM(CASE WHEN APRENDIZ_FICHA.estado = 'inducción' THEN 1 ELSE 0 END) AS inducción,
                SUM(CASE WHEN APRENDIZ_FICHA.estado = 'en formación' THEN 1 ELSE 0 END) AS 'en formación',
                SUM(CASE WHEN APRENDIZ_FICHA.estado = 'matrícula cancelada' THEN 1 ELSE 0 END) AS 'matrícula cancelada',
                SUM(CASE WHEN APRENDIZ_FICHA.estado = 'cancelado' THEN 1 ELSE 0 END) AS cancelado,
                SUM(CASE WHEN APRENDIZ_FICHA.estado = 'certificado' THEN 1 ELSE 0 END) AS certificado
                FROM APRENDIZ_FICHA INNER JOIN ficha ON APRENDIZ_FICHA.COD_FICHA = ficha.codigo
                INNER JOIN programa ON ficha.COD_PROGRAMA = programa.codigo
                GROUP BY ficha.codigo, programa.nombre
                ORDER BY programa.nombre;";

                // almacena el resultado de ejecutar la consulta
                $result = $link -> query($query);
                if($result -> num_rows > 0) {
                echo '
                <b>CONSULTA '.$respuesta.'</b><br><br>
                <table class="table-query">
                <tr>
                    <th>CÓDIGO</th>
                    <th>NOMBRE</th>
                    <th>INDUCCIÓN</th>
                    <th>EN<br>FORMACIÓN</th>
                    <th>MATRÍCULA<br>CANCELADA</th>
                    <th>CANCELADO</th>
                    <th>CERTIFICADO</th>
                </tr>
                ';
                    // corre hasta que no hayan más filas para leer
                    while($row = $result -> fetch_assoc()) {
                        echo '
                        <tr>
                            <td class="center">'.$row['codigo'].'</td>
                            <td>'.$row['nombre'].'</td>
                            <td class="center">'.$row['inducción'].'</td>
                            <td class="center">'.$row['en formación'].'</td>
                            <td class="center">'.$row['matrícula cancelada'].'</td>
                            <td class="center">'.$row['cancelado'].'</td>
                            <td class="center">'.$row['certificado'].'</td>
                        </tr>
                        ';
                    }
                echo '
                </table>';

                } else {
                echo '
                <br> No se encontraron registros.';
                }
                break;
            case "3":
                // consulta  
                $query = "SELECT documento, CONCAT(nombre, ' ', apellido1, ' ', apellido2) AS nombre, ficha.codigo, APRENDIZ_FICHA.estado FROM aprendiz
                INNER JOIN APRENDIZ_FICHA ON aprendiz.documento = APRENDIZ_FICHA.ID_APRENDIZ
                INNER JOIN ficha ON APRENDIZ_FICHA.COD_FICHA = ficha.codigo
                ORDER BY nombre;";

                // almacena el resultado de ejecutar la consulta
                $result = $link -> query($query);
                if($result -> num_rows > 0) {
                echo '
                <b>CONSULTA '.$respuesta.'</b><br><br>
                <table class="table-query">
                <tr>
                    <th>DOCUMENTO</th>
                    <th>NOMBRE</th>
                    <th>FICHA</th>
                    <th>ESTADO</th>
                </tr>
                ';
                    // corre hasta que no hayan más filas para leer
                    while($row = $result -> fetch_assoc()) {
                        echo '
                        <tr>
                            <td class="center">'.$row['documento'].'</td>
                            <td>'.$row['nombre'].'</td>
                            <td class="center">'.$row['codigo'].'</td>
                            <td>'.$row['estado'].'</td>
                        </tr>
                        ';
                    }
                echo '
                </table>';

                } else {
                echo '
                <br> No se encontraron registros.';
                }
                break;
            case "4":
                // consulta  
                $query = "SELECT codigo, nombre, nivel FROM programa
                ORDER BY nombre;";

                // almacena el resultado de ejecutar la consulta
                $result = $link -> query($query);
                if($result -> num_rows > 0) {
                echo '
                <b>CONSULTA '.$respuesta.'</b><br><br>
                <table class="table-query">
                <tr>
                    <th>CÓDIGO</th>
                    <th>PROGRAMA</th>
                    <th>NIVEL</th>
                </tr>
                ';
                    // corre hasta que no hayan más filas para leer
                    while($row = $result -> fetch_assoc()) {
                        echo '
                        <tr>
                            <td>'.$row['codigo'].'</td>
                            <td>'.$row['nombre'].'</td>
                            <td>'.$row['nivel'].'</td>
                        </tr>
                        ';
                    }
                echo '
                </table>';

                } else {
                echo '
                <br> No se encontraron registros.';
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
