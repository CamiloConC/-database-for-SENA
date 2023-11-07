<?php include('../../0/components/elements-l3.php'); ?>
<?php include('../../1/crud.php'); ?>

<body>
    <div class="principal">
        <h2>Registro de ficha</h2>
        <hr>
        
        <form action="code-ficha.php" method="post" accept-charset="utf-8" class="row g-3">

        <div class="col-12">
            <label class="form-label" for="programa">Código del programa *</label>
            <select class="form-select" name="COD_PROGRAMA" id="programa" required>
                <option value="" style="display: none">Selecciona una opción</option>
                    <?php
                        // conecta a la base de datos
                        conectar();
                        // consulta  
                        $query = "SELECT codigo, nombre FROM programa ORDER BY nombre";
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
                        $link -> close();
                    ?>
            </select>
        </div>

        <div class="col-12 col-md-5">
            <label class="form-label" for="codigo">Código ficha¹ *</label>
            <input class="form-control" type="number" name="codigo" id="codigo" length="7" required>
            <p style="font-size: 0.7em; margin-bottom: 0px;">¹Deben ser siete cifras</p>
        </div>
        <div class="col-12 col-md-7">
            <label class="form-label" for="estado">Estado:</label>
            <select class="form-select" name="estado" id="estado" required>
                <option value="" style="display: none"></option>
                <option value="induccion">Inducción</option>
                <option value="en formacion">En formación</option>
                <option value="cancelado">Cancelado</option>
                <option value="finalizado por fecha">Finalizado por fecha</option>
                <option value="finalizado">Finalizado</option>
            </select>
        </div>

        <div class="col-12 col-md-5">
            <label class="form-label" for="f_inicio_lectiva">Inicio etapa lectiva *</label>
        </div>
        <div class="col-12 col-md-7">
            <input class="form-control" type="date" id="f_inicio_lectiva" name="f_inicio_lectiva" required>
        </div>

        <div class="col-12 col-md-5">
            <label class="form-label" for="f_fin_lectiva">Fin etapa lectiva *</label>
        </div>
        <div class="col-12 col-md-7">
            <input class="form-control" type="date" id="f_fin_lectiva" name="f_fin_lectiva" required>
        </div>

        <div class="col-12 col-md-5">
            <label class="form-label" for="f_terminacion">Terminación *</label>
        </div>
        <div class="col-12 col-md-7">
            <input class="form-control" type="date" id="f_terminacion" name="f_terminacion" required>
        </div>

        <div class="d-flex align-items-center justify-content-center">
            <button class="button-submit" type="submit" name="enviar" style="width: 50%">Enviar</button>
        </div>
    </form>
    </div>

<?php include('../../0/components/footer.php'); ?>