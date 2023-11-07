<?php
    if(isset($_POST['parametro'])) {
        $tabla = $_POST['parametro'];
    } else {
        $tabla = 'aprendíz';
    }

    if($tabla != 'aprendíz') {
        switch ($tabla) {
            // case 'aprendíz':
                // header('Location: update/aprendiz.php');
                // break;
            case 'programa':
            case 'ficha':
                header('Location: ../0/e/error.php');
                break;
        }
    }
?>

<?php include_once('../0/components/elements-l2.php'); ?>
<?php include("../1/crud.php"); ?>

<div class="show-query">
    <h4 style="margin-top: 20px;">Listando información por: <u style="font-weight: normal;"><?php echo $tabla ?></u></h4>
    <br>

    <form action="" method="post">
        <div class="row d-flex justify-content-center">
            <div class="input-group">
                <div class="form-outline">
                    <input type="search" id="form1" name="buscar_documento" class="form-control" value="" placeholder="Buscar por documento"/>
                </div>
                <button type="submit" class="btn btn-primary">
                    Buscar
                </button>
            </div>
        </div>
    </form>


    <?php
        // conectar a la base de datos
        conectar();
        if(isset($_POST['buscar_documento'])) {
            if($_POST['buscar_documento'] == "") {
                // consulta por defecto si no se incluye un parámetro de búsqueda
                $consulta = "SELECT * FROM aprendiz ORDER BY documento LIMIT 15;";
            } else {
                // consulta para buscar coincidencias
                $consulta = 'SELECT * FROM aprendiz WHERE documento LIKE "'.$_POST["buscar_documento"].'%" ORDER BY documento;';
            }           
        } else {
            // consulta para buscar todos los primeros 15 registros
            $consulta = "SELECT * FROM aprendiz ORDER BY documento LIMIT 15;";
        }

        // almacena el resultado de ejecutar la consulta
        $data = $link -> query($consulta);
        $registros = $link -> query("SELECT COUNT(documento) FROM aprendiz");
        if($data -> num_rows > 0) {
            $row = $registros -> fetch_assoc();
            echo '
            <form action="update/aprendiz.php" method="post">
            <p class="p-description">Mostrando registros: '.$data -> num_rows.' de '.$row['COUNT(documento)'].'</p>
            <table class="table-query">
                <tr>
                    <th>TIPO</th>
                    <th>DOCUMENTO</th>
                    <th>NOMBRE</th>
                    <th></th>
                </tr>
            ';
            global $i;
            $i = 0;
            // corre hasta que no hayan más filas para leer
            while($row = $data -> fetch_assoc()) {

                echo '
                
                <tr>
                    <td>'.$row["t_documento"].'</td>
                    <td>'.$row["documento"].'</td>
                    <td>'.$row["nombre"].' '.$row["apellido1"].' '.$row["apellido2"].'</td>
                    <td>
                        <button type="submit" class="button-reset" style="margin: 1px; padding: 1px;" name="documento" value='.$row["documento"].'>
                            editar
                        </button>
                    </td>
                </tr>
                ';
                $i++;
            }
            echo '
            </table>
            </form>';
        } else {
            echo 'No se encontraron registros.';
        }
        desconectar($link);
    ?>
</div>

<?php include('../0/components/footer.php'); ?>