<?php include('../0/components/elements-l2.php'); ?>

<div class="principal">
    <div class="container">
        <img id="logo" src="../0/images/logo_SENA.png" alt="logo">
        <div class="sena">
            <h1>SENA</h1>
            <p id="description">Servicio Nacional de Aprendizaje</p>
        </div>
    </div>
    <hr class="separator">

    <form action="edit.php" method="post">
        <h3>Listar información según:</h3>
        <p class="p-description">Seleccione a continuación el tipo de dato a consultar en toda la base de datos.</p>

        <button class="button-principal" name="parametro" value="programa" type="submit">
            <h4>Programa</h4>
            <details>
                <summary><u>Ver campos</u></summary>
                <p class="p-description">Código, nombre y nivel</p>
            </details>
        </button>

        <button class="button-principal" name="parametro" value="ficha" type="submit">
            <h4>Ficha</h4>
            <details>
                <summary><u>Ver campos</u></summary>
                <p class="p-description">Código, estado, inicio etapa lectiva, fin etapa lectiva, fecha de finalización, código programa</p>
            </details>
        </button>

        <button class="button-principal" name="parametro" value="aprendíz" type="submit">
            <h4>Aprendíz</h4>
            <details>
                <summary><u>Ver campos</u></summary>
                <p class="p-description">
                    Documento, tipo documento, 1er apellido, 2do apellido, email institucional, email personal, celular 
                    teléfono, tipo sangre, fecha nacimiento, dirección, nombre acudiente, celular acudiente.
                </p>
            </details>
        </button>
    </form>
</div>

<?php include('../0/components/footer.php'); ?>
