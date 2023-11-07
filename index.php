<?php include("main/0/components/elements-l0.php");?>
<link rel="icon" type="image/x-icon" href="main/0/images/logo_SENA.png">

    <div class="principal">
        <div class="container">
            <img id="logo" src="main/0/images/logo_SENA.png" title="SENA" alt="logo">
            <div class="sena">
                <h1>SENA</h1>
                <p id="description">Servicio Nacional de Aprendizaje</p>
            </div>
        </div>
        <hr class="separator">
        <h4>¿Qué deseas realizar hoy?</h4><br>

        <a href='main/c/menu.php'>
            <button class="button-principal" type="submit" name="opcion" value="c">
                <p>Crear nuevo registro</p>
            </button>
        </a>

        <a href='main/r/read1.php'>
            <button class="button-principal" type="submit" name="opcion" value="r1">
                <p>Consultas predeterminadas</p>
            </button>
        </a>

        <a href='main/r/read2.php'>
            <button class="button-principal" type="submit" name="opcion" value="r2">
                <p>Consultar por tablas</p>
            </button>
        </a>

        <a href='main/u/menu.php'>
            <button class="button-principal" type="submit" name="opcion" value="u">
                <p>Actualizar registros</p>
            </button>
        </a>
        
        <a href='main/0/e/error.php'>
            <button class="button-principal" type="submit" name="opcion" value="d">
                <p>Eliminar registros de una tabla</p>
            </button>
        </a>
    </div>

<?php include("main/0/components/footer.php");?>