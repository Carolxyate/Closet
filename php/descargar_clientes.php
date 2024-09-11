<?php
session_start();

// Verificar si el usuario ha iniciado sesión y es un administrador
if (!isset($_SESSION['user_id']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../inicio_sesion.html");
    exit;
}

// Conexión a la base de datos
include 'conexion.php';

// Obtener la lista de clientes
$query_clientes = "SELECT * FROM clientes";
$result_clientes = $conexion->query($query_clientes);

// Establecer los encabezados para la descarga del archivo CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=clientes.csv');

// Crear un archivo temporal para almacenar el contenido CSV
$output = fopen('php://output', 'w');

// Escribir los encabezados de las columnas en el archivo CSV
fputcsv($output, array('ID', 'Nombre', 'Apellido', 'Email', 'Password', 'Tipo documento', 'Numero documento', 'Telefono'));

// Escribir los datos de los clientes en el archivo CSV
while ($row_cliente = $result_clientes->fetch_assoc()) {
    fputcsv($output, $row_cliente);
}

// Cerrar el archivo temporal
fclose($output);
exit;
?>
