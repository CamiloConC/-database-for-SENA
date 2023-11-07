<?php include('../../0/components/elements-l3.php'); ?>

    <div class="principal">
        <h2>Registro de aprendíz</h2>
        <p>Llena los campos requeridos para insertar el nuevo registro.</p>
        <hr>

        <form action="code-aprendiz.php" method="post" accept-charset="utf-8" class="row g-2">
            
        <div class="col-12">
            <label for="nombre" class="form-label">Nombres *</label>
            <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Camilo" required>
            <div class="invalid-feedback">
                Ingresa el nombre
            </div>
        </div>

        <div class="col-12">
            <label for="apellido1" class="form-label">Primer apellido *</label>
            <input name="apellido1" type="text" class="form-control" id="apellido1" placeholder="Sánchez" required>
            <div class="valid-feedback">
                Ingresa primer apellido
            </div>
        </div>

        <div class="col-12">
            <label for="apellido2" class="form-label">Segundo apellido</label>
            <input name="apellido2" type="text" class="form-control" id="apellido2">
        </div>

        <div class="col-12">
            <label for="documento" class="form-label">Documento *</label>
            <div class="input-group z-1">
                <select name="t_documento" class="form-select" length="10" style="width: 20px;" required>
                    <option selected value="CC">CC</option>
                    <option value="TI">TI</option>
                    <option value="PP">PP</option>
                    <option value="CE">CE</option>
                </select>
                <div class="col-9 z-1" >
                    <input name="documento" id="documento" type="number" class="form-control" aria-label="Text input with dropdown button" min="0" minlength="7" maxlength="10" required>
                </div>
            </div>
        </div>

            
        <div class="col-12">
            <label for="email_institucional" class="form-label">Correo institucional *</label>
            <input name="email_institucional" type="email" class="form-control" id="email_institucional" placeholder="nombre@misena.edu.co" required>
            <div class="invalid-feedback">
                Correo no válido.
            </div>
        </div>

        <div class="col-12">
            <label for="email_personal" class="form-label">Correo personal *</label>
            <input name="email_personal" type="email" class="form-control" id="email_personal" placeholder="nombre@gmail.com" required>
            <div class="invalid-feedback">
                Correo no válido.
            </div>
        </div>

        <div class="col-12">
            <label for="celular" class="form-label">Celular *</label>
            <input name="celular" id="celular" type="number" class="form-control" aria-label="Text input with dropdown button" placeholder="3001234567" pattern="[3][0-9]{9}" required>
            <div class="invalid-feedback">
                El número no es válido.
            </div>
        </div>

        <div class="col-12">
            <label for="telefono" class="form-label">Teléfono</label>
            <input name="telefono" id="telefono" type="number" class="form-control" aria-label="Text input with dropdown button" placeholder="6011234567" length="10" min="0" pattern="[6][0-9]{9}">
            <div class="invalid-feedback">
                El número no es válido.
            </div>
        </div>

        <div class="col-12">
            <label for="direccion" class="form-label">Dirección de residencia *</label>
            <input name="direccion" type="text" class="form-control" id="direccion" value="Av 07 # 1E-23, Barrio La Alegría, Ciudad, Departamento" required>
        </div>

        <div class="col-12 col-md-4">
            <label for="t_sangre" class="form-label">T. sangre *</label>
            <select name="t_sangre" id="t_sangre" class="form-select" required>
                <option value="" style="display: none">...</option>
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
            <input name="f_nacimiento" id="f_nacimiento" type="date" class="form-control" aria-label="Text input with dropdown button" required>
        </div>

        <div class="col-12">
            <label for="nombre_acudiente" class="form-label">Nombre acudiente</label>
            <input name="nombre_acudiente" id="nombre_acudiente" type="text" class="form-control">
        </div>

        <div class="col-12">
            <label for="celular_acudiente" class="form-label">Celular acudiente</label>
            <input name="celular_acudiente" id="celular_acudiente" type="number" class="form-control" aria-label="Text input with dropdown button" placeholder="3001234567" pattern="[3][0-9]{9}">
            <div class="invalid-feedback">
                El número no es válido.
            </div>
        </div>
        <br><br>

        <div class="col-6">
            <button class="button-reset" type="reset">Limpiar</button>
        </div>
        <div class="col-6">
            <button class="button-submit" type="submit">Enviar</button>
        </div>

        </form>
    </div>
    
<?php include('../../0/components/footer.php'); ?>
