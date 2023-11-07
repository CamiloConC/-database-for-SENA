<?php include('../../1/crud.php'); ?>

<?php
// Obtener los datos del formulario y realizar la inserción
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Realiza la conección a la base de datos (*ver archivo crud.php)
    conectar();
    $documento = $_POST['documento'];
    $t_documento = $_POST['t_documento'];
    $nombre = ucwords(strtolower($_POST['nombre']));
    $apellido1 = ucwords(strtolower($_POST['apellido1']));
    $apellido2 = ucwords(strtolower($_POST['apellido2']));
    $e_institucional = strtolower($_POST['email_institucional']);
    $e_personal = strtolower($_POST['email_personal']);
    $celular = $_POST['celular'];
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null; //NOT REQUIRED
    $t_sangre = $_POST['t_sangre'];
    $f_nacimiento = $_POST['f_nacimiento'];
    $direccion = ucwords(strtolower($_POST['direccion']));
    $nombre_acudiente = isset($_POST['nombre_acudiente']) ? ucwords(strtolower($_POST['nombre_acudiente'])) : null; //NOT REQUIRED
    $celular_acudiente = isset($_POST['celular_acudiente']) ? $_POST['celular_acudiente'] : null; //NOT REQUIRED
    
    // Preparar la consulta SQL para insertar datos en la tabla aprendices
    $sql = "INSERT INTO aprendiz (documento, t_documento, nombre, apellido1, apellido2, 
                email_institucional, email_personal, celular, telefono, t_sangre, 
                f_nacimiento, direccion, nombre_acudiente, celular_acudiente) 
            VALUES ('$documento', '$t_documento', '$nombre', '$apellido1', '$apellido2',
             '$e_institucional', '$e_personal', '$celular', '$telefono', '$t_sangre',
             '$f_nacimiento', '$direccion', '$nombre_acudiente', '$celular_acudiente')";

    if (mysqli_query($link, $sql)) {
        // cierra la conexión a la base de datos
        desconectar($link);

        echo '
        <script language="javascript">
            alert("Registro de aprendíz insertado correctamente");
            window.location.href="../menu.php"
        </script>';
    } else {
        echo "Error al insertar el registro: " . mysqli_error($link).'<br>';
    }
}