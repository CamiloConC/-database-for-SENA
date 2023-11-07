<?php include('../../1/crud.php'); ?>

<?php
conectar();

// Obtener los datos del formulario y realizar la inserción
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_APRENDIZ = $_POST['ID_APRENDIZ'];
    $COD_FICHA = $_POST['COD_FICHA'];
    $estado = $_POST['estado'];
    $f_inicio = $_POST['f_inicio'];
    $f_fin = $_POST['f_fin'];
    
    // Preparar la consulta SQL para insertar datos en la tabla aprendices
    $sql = "INSERT INTO APRENDIZ_FICHA (ID_APRENDIZ, COD_FICHA, estado, f_inicio, f_fin) 
            VALUES ('$ID_APRENDIZ', '$COD_FICHA', '$estado', '$f_inicio', '$f_fin')";

    if (mysqli_query($link, $sql)) {
        // cierra la conexión a la base de datos
        desconectar($link);

        echo '
        <script language="javascript">
            alert("Registro de novedad insertado correctamente");
            window.location.href="novedad.php"
        </script>';
    } else {
        echo "Error al insertar el registro: " . mysqli_error($link);
    }
}
?>