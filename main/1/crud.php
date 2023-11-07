<?php
function conectar() {
    // Datos para credenciales
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "db_SENA";

    // Datos para credenciales
    // $servername = "sql207.infinityfree.com";
    // $username = "if0_35129344";
    // $password = "39ilZjXxcNgMcqb";
    // $database = "if0_35129344_db_SENA";

    // Crear conexión
    global $link;
    $link = new mysqli($servername, $username, $password, $database);
    // configura la conexión para que admita caráceters especiales
    mysqli_set_charset($link, "utf8");

    // Verificar la conexión
    if ($link->connect_error) {
        die("Conección fallida: " . $link->connect_error);
    }
}

function desconectar($link) {
    $link->close();
}

function consultar_tabla($tipo) {
    conectar();
    return $sql = 'SELECT * FROM '.$tipo;
}

function editar_tabla($tipo) {}
?>
