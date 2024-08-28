<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro_usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tipo_documento = $_POST['tipo'];
$numero_documento = $_POST['numero'];
$telefono = $_POST['telefono'];
$terminos = isset($_POST['terminos']) ? 1 : 0;

$sql = "INSERT INTO clientes (email, password, nombre, apellido, tipo_documento, numero_documento, telefono, terminos) 
        VALUES ('$email', '$password', '$nombre', '$apellido', '$tipo_documento', '$numero_documento', '$telefono', '$terminos')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Registro exitoso');
            setTimeout(function() {
                window.location.href = '../inicio_sesion.html';
            }, 2000);
          </script>";
} else {
    echo "<script>
            alert('Error: " . $conn->error . "');
            setTimeout(function() {
                window.location.href = '../registro.html';
            }, 2000);
          </script>";
}

$conn->close();
?>
