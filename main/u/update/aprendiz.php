<?php include_once('../../0/components/elements-l3.php'); ?>
<?php include("../../1/crud.php"); ?>

<?php
    $documento = $_POST["documento"];

    // // conecta a la base de datos
    conectar();
    // // consulta a ejecutar
    $consulta = "SELECT * FROM aprendiz WHERE documento = $documento;";
    $data = $link -> query($consulta);
?>
<div class="principal">
    <h2>Actualización de aprendíz</h2>
    <p>Llena los campos requeridos para insertar el nuevo registro.</p>
    <hr>
    <?php
    if($data -> num_rows > 0) {
        $row = $data -> fetch_assoc()
    ?>
    <form action="code-aprendiz.php" method="post" accept-charset="utf-8" class="row g-2">

    <div class="col-12">
        <label for="nombre" class="form-label">Nombres *</label>
        <input name="nombre" type="text" class="form-control" id="nombre" value="<?php echo $row["nombre"]?>" required>
        <div class="invalid-feedback">
            Ingrese el nombre
        </div>
    </div>

    <div class="col-12">
        <label for="apellido1" class="form-label">Primer apellido *</label>
        <input name="apellido1" type="text" class="form-control" id="apellido1" value="<?php echo $row["apellido1"]?>" required>
        <div class="valid-feedback">
            Ingrese primer apellido
        </div>
    </div>

    <div class="col-12">
        <label for="apellido2" class="form-label">Segundo apellido</label>
        <input name="apellido2" type="text" class="form-control" id="apellido2" value="<?php echo $row["apellido2"]?>">
    </div>

    <div class="col-12">
        <label for="t_documento" class="form-label">Documento *</label>
        <div class="input-group z-1">
            <select name="t_documento" class="form-select" style="width: 20px;" required>
                <option selected value="<?php echo $row["t_documento"]?>" style="display: none"><?php echo $row["t_documento"]?></option>
                <option value="CC">CC</option>
                <option value="TI">TI</option>
                <option value="PP">PP</option>
                <option value="CE">CE</option>
            </select>
            <div class="col-9 z-1" >
                <input name="documento" id="documento" type="number" class="form-control" value="<?php echo $row["documento"]?>" aria-label="Text input with dropdown button" min="0" minlength="7" maxlength="10" disabled>
            </div>
        </div>
    </div>
        
    <div class="col-12">
        <label for="email_institucional" class="form-label">Correo institucional *</label>
        <input name="email_institucional" type="email" class="form-control" id="email_institucional" value="<?php echo $row["email_institucional"]?>" disabled>
        <div class="invalid-feedback">
            Correo no válido.
        </div>
    </div>

    <div class="col-12">
        <label for="email_personal" class="form-label">Correo personal *</label>
        <input name="email_personal" type="email" class="form-control" id="email_personal" value="<?php echo $row["email_personal"]?>" required>
        <div class="invalid-feedback">
            Correo no válido.
        </div>
    </div>

    <div class="col-12">
        <label for="celular" class="form-label">Celular *</label>
        <input name="celular" id="celular" type="tel" class="form-control" aria-label="Text input with dropdown button" value="<?php echo $row["celular"]?>" pattern="[3][0-9]{9}" required>
        <div class="invalid-feedback">
            El número no es válido.
        </div>
    </div>

    <div class="col-12">
        <label for="telefono" class="form-label">Teléfono</label>
        <input name="telefono" id="telefono" type="tel" class="form-control" aria-label="Text input with dropdown button" value="<?php echo $row["telefono"]?>" length="10" min="0" pattern="[6][0-9]{9}">
        <div class="invalid-feedback">
            El número no es válido.
        </div>
    </div>

    <div class="col-12">
        <label for="direccion" class="form-label">Dirección de residencia *</label>
        <input name="direccion" type="text" class="form-control" id="direccion" value="<?php echo $row["direccion"]?>" required>
    </div>

    <div class="col-12 col-md-4">
        <label for="t_sangre" class="form-label">T. sangre *</label>
        <select name="t_sangre" id="t_sangre" class="form-select" required>
            <option value="<?php echo $row["t_sangre"]?>" style="display: none"><?php echo $row["t_sangre"]?></option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select>
    </div>
    <div class="col-12 col-md-8">
        <label for="f_nacimiento" class="form-label">Fecha de nacimiento *</label>
        <input name="f_nacimiento" id="f_nacimiento" type="date" class="form-control" value="<?php echo date('Y-m-d',  strtotime($row["f_nacimiento"]))?>" aria-label="Text input with dropdown button" required>
    </div>

    <div class="col-12">
        <label for="nombre_acudiente" class="form-label">Nombre acudiente</label>
        <input name="nombre_acudiente" id="nombre_acudiente" type="text" class="form-control" value="<?php echo $row["nombre_acudiente"]?>">
    </div>

    <div class="col-12">
        <label for="celular_acudiente" class="form-label">Celular acudiente</label>
        <input name="celular_acudiente" id="celular_acudiente" type="number" class="form-control" aria-label="Text input with dropdown button" value="<?php echo $row["celular_acudiente"]?>" pattern="[3][0-9]{9}">
        <div class="invalid-feedback">
            El número no es válido.
        </div>
    </div>
    <br><br>

    <div class="col-6">
        <button class="button-reset" type="reset">Restablecer</button>
    </div>
    <div class="col-6">
        <button class="button-submit" name="documento" value="<?php echo $row["documento"]?>" type="submit">Enviar</button>
    </div>
    <?php
        } else {
            echo 'Ups, algo salió mal :(';
        } 
        desconectar($link);
    ?>
    </form>
</div>

<?php include_once('../../0/components/footer.php'); ?>
