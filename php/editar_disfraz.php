<?php

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro_usuarios";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_POST['imagen'];

    // Actualizar el disfraz en la base de datos
    $sql = "UPDATE disfraces SET nombre='$nombre', descripcion='$descripcion', imagen='$imagen' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Disfraz actualizado exitosamente";
    } else {
        echo "Error actualizando el disfraz: " . $conn->error;
    }
} else {
    // Obtener el id del disfraz a editar
    $id = $_GET['id'];
    $sql = "SELECT * FROM disfraces WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontró el disfraz";
        exit;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Disfraz</title>
    <script src="https://use.fontawesome.com/502b7294a9.js"></script>
    <link rel="stylesheet" href="css/redes.css">
    <link rel="stylesheet" href="css/editar.css">
</head>


<body>
<div class="red">
        <div id="facebook"><a href="https://www.facebook.com/closet magico" target="none" class="fa fa-facebook"></a></div>
        <div id="instagram"><a href="https://www.instagram.com/" class="fa fa-instagram"></a></div>
        <div id="whatsapp"><a href="https://www.whatsapp.com/" class="fa fa-whatsapp"></a></div>
        <div id="correo"><a href="https://www.gmail.com/" class="fa fa-envelope"></a></div>
    </div>
    <header>
        <nav class="navegacion">
            <ul class="menu">
                <li class="lista"><a href="admin_dashboard.php">PERFIL</a>
                </li>
                

                <li class="buscar">
                    <form action="get">
                            <input type="text" placeholder="Encuentra un disfraz">
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                </svg>
                            </button>
                    </form>
                </li>

                <li class="lista"><a href="agregar_favorito.php">ver disfraces</a>
                    
                </li>
            </ul>
        </nav>
    </header>
    <h1>Editar Disfraz</h1>
    <form class="editar" action="editar_disfraz.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>"><br>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"><?php echo $row['descripcion']; ?></textarea><br>
        <label for="imagen">URL de la imagen:</label>
        <input type="text" id="imagen" name="imagen" value="<?php echo $row['imagen']; ?>"><br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
