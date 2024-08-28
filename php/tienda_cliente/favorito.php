<?php
session_start();
include 'conexion.php';

if (isset($_SESSION['id_cliente']) && isset($_GET['id_disfraz'])) {
    $id_cliente = $_SESSION['id_cliente'];
    $id_disfraz = $_GET['id_disfraz'];

    // Verificar si el disfraz ya está en favoritos
    $check_sql = "SELECT * FROM favoritos WHERE id_cliente = ? AND id_disfraz = ?";
    $stmt = $conexion->prepare($check_sql);
    $stmt->bind_param('ii', $id_cliente, $id_disfraz);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // El disfraz ya está en favoritos
        echo "El disfraz ya está en tu lista de favoritos.";
    } else {
        // Agregar el disfraz a la lista de favoritos
        $sql = "INSERT INTO favoritos (id_cliente, id_disfraz) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('ii', $id_cliente, $id_disfraz);

        if ($stmt->execute()) {
            echo "Disfraz agregado a favoritos correctamente.";
        } else {
            echo "Error al agregar el disfraz a favoritos: " . $conexion->error;
        }
    }
} else {
    echo "Por favor, inicia sesión y selecciona un disfraz.";
}

$conexion->close();
?>
