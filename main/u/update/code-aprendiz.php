<?php include('../../1/crud.php'); ?>

<?php
// Obtener los datos del formulario y realizar la inserción
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // definición de variables
    $documento = $_POST['documento'];
    $t_documento = $_POST['t_documento'];
    $nombre = ucwords(strtolower($_POST['nombre']));
    $apellido1 = ucwords(strtolower($_POST['apellido1']));
    $apellido2 = ucwords(strtolower($_POST['apellido2']));
    $e_personal = strtolower($_POST['email_personal']);
    $celular = $_POST['celular'];
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null; //NOT REQUIRED
    $t_sangre = $_POST['t_sangre'];
    $f_nacimiento = $_POST['f_nacimiento'];
    $direccion = $_POST['direccion'];
    $nombre_acudiente = isset($_POST['nombre_acudiente']) ? ucwords(strtolower($_POST['nombre_acudiente'])) : null; //NOT REQUIRED
    $celular_acudiente = isset($_POST['celular_acudiente']) ? $_POST['celular_acudiente'] : null; //NOT REQUIRED
    
    // Realiza la conección a la base de datos (*ver archivo crud.php)
    conectar();
    
    // Preparar la consulta SQL para insertar datos en la tabla aprendices
    $sql = "UPDATE aprendiz
            SET t_documento = '$t_documento',
                nombre = '$nombre',
                apellido1 = '$apellido1',
                apellido2 = '$apellido2',
                email_personal = '$e_personal',
                celular = $celular,
                telefono = $telefono,
                t_sangre = '$t_sangre',
                f_nacimiento = '$f_nacimiento',
                direccion = '$direccion',
                nombre_acudiente = '$nombre_acudiente',
                celular_acudiente = $celular_acudiente
            WHERE documento = $documento;";

    if ($link->query($sql) === TRUE) {
        desconectar($link);
        echo '
        <script language="javascript">
            alert("Los datos del aprendíz se han actualizado correctamente");
            window.location.href="../menu.php"
        </script>';
      } else {
        echo "Error al actualizar el registro: " . $link->error;
    } 
    // Cierra la coneccion a la base de datos
    desconectar($link);
} else {
    echo 'Ups, algo no salió bien :(';
}
?>