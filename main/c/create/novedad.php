<?php include('../../0/components/elements-l3.php'); ?>
<?php include('../../1/crud.php'); ?>

<div class="principal">
    <h2>Novedad aprendíz</h2>
    <hr>
    
    <form action="code-novedad.php" method="post" accept-charset="utf-8" class="row g-3">
    
    <div class="col-12">
        <label class="form-label" for="COD_FICHA">Código ficha *</label>
        <select class="form-select" name="COD_FICHA" id="COD_FICHA" required>
            <option value="" style="display: none" disable>Selecciona una opción</option>
                <?php
                    // conecta a la base de datos
                    conectar();
                    // consulta  
                    $query = "SELECT ficha.codigo AS codigo, nombre  FROM ficha
                    INNER JOIN programa ON ficha.COD_PROGRAMA = programa.codigo ORDER BY nombre, codigo;";
                    // almacena el resultado de ejecutar la consulta
                    $data = $link -> query($query);

                    if($data -> num_rows > 0) {
                        // corre hasta que no hayan más filas para leer
                        while($row = $data -> fetch_assoc()) {
                            echo '
                            <option value="'.$row['codigo'].'">'.$row['codigo'].' - '.$row['nombre'].'</option>
                            ';
                        }
                    }
                ?>
        </select>
    </div>

    <div class="col-12">
        <label class="form-label" for="ID_APRENDIZ">Documento del aprendíz *</label>
        <select class="form-select" name="ID_APRENDIZ" id="ID_APRENDIZ" required>
            <option value="" style="display: none">Selecciona una opción</option>
                <?php
                    // consulta
                    $query = "SELECT documento, nombre, apellido1, apellido2 FROM aprendiz";
                    // almacena el resultado de ejecutar la consulta
                    $data = $link -> query($query);

                    if($data -> num_rows > 0) {
                        // corre hasta que no hayan más filas para leer
                        while($row = $data -> fetch_assoc()) {
                            echo '
                            <option value="'.$row['documento'].'">'.$row['documento'].' - '.$row['apellido1'].' '.$row['apellido2'].' '.$row['nombre'].'</option>
                            ';
                        }
                    }
                    desconectar($link);
                ?>
        </select>
    </div>

    <div class="col-12">
        <label class="form-label" for="estado">Estado *</label><br>
        <select class="form-select" name="estado" id="estado" required>
            <option value="" style="display: none">Selecciona una opción</option>
            <option value="inducción">Inducción</option>
            <option value="en formación">En formación</option>
            <option value="matrícula cancelada">Matrícula cancelada</option>
            <option value="cancelado">Cancelado</option>
            <option value="certificado">Certificado</option>
        </select>
    </div>

    <div class="col-12 col-md-4">
        <label class="form-label" for="f_inicio">Fecha inicio *</label>
    </div>
    <div class="col-12 col-md-8">
        <input class="form-control" type="date" id="f_inicio" name="f_inicio" required>
    </div>

    <div class="col-12 col-md-4">
        <label class="form-label" for="f_fin">Fecha fin *</label>
    </div>
    <div class="col-12 col-md-8">
        <input class="form-control" type="date" id="f_fin" name="f_fin" required>
    </div>

    <div class="d-flex align-items-center justify-content-center">
        <button class="button-submit" type="submit" name="enviar" style="width: 50%">Enviar</button>
    </div>
    </form>
</div>

<?php include('../../0/components/footer.php'); ?>