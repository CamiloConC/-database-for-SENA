<?php include('../../1/crud.php'); ?>

<?php
conectar();

// Obtener los datos del formulario y realizar la inserción
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $estado = $_POST['estado'];
    $f_inicio_lectiva = $_POST['f_inicio_lectiva'];
    $f_fin_lectiva = $_POST['f_fin_lectiva'];
    $f_terminacion = $_POST['f_terminacion'];
    $COD_PROGRAMA = $_POST['COD_PROGRAMA'];
    
    // Preparar la consulta SQL para insertar datos en la tabla aprendices
    $query = "INSERT INTO ficha (codigo, estado, f_inicio_lectiva, f_fin_lectiva, f_terminacion, COD_PROGRAMA) 
            VALUES ('$codigo', '$estado', '$f_inicio_lectiva', '$f_fin_lectiva', '$f_terminacion', '$COD_PROGRAMA')";

    if (mysqli_query($link, $query)) {
        // cierra la conexión a la base de datos
        desconectar($link);

        echo '
        <script language="javascript">
            alert("Registro de ficha insertado correctamente");
            window.location.href="ficha.php"
        </script>';
    } else {
        echo "Error al insertar el registro: " . mysqli_error($link);
    }
}
?>