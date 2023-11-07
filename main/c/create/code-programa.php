<?php include('../../1/crud.php'); ?>

<?php
conectar();

// Obtener los datos del formulario y realizar la inserción
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $nombre = ucwords(strtolower($_POST['nombre']));
    $nivel = $_POST['nivel'];
    
    // Preparar la consulta SQL para insertar datos en la tabla aprendices
    $sql = "INSERT INTO programa (codigo, nombre, nivel) 
            VALUES ('$codigo', '$nombre', '$nivel')";

    if (mysqli_query($link, $sql)) {
        // cierra la conexión a la base de datos
        desconectar($link);
        echo '
        <script language="javascript">
            alert("Registro de ficha insertado correctamente");
            window.location.href="../forms/form_programa.php"
        </script>';
    } else {
        echo "Error al insertar el registro: " . mysqli_error($link);
    }
}
?>