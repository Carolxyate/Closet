<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro_usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Closet Magico</title>
    <link rel="icon" href="img/CLOSET-MAGICO-OP-2-removebg-preview.png">
    <script src="https://use.fontawesome.com/502b7294a9.js"></script>
    <link rel="stylesheet" href="css/redes.css">
    <link rel="stylesheet" href="css/ver.css">
</head>
<style>
    /* Estilos CSS adicionales aquí */
</style>

<body>
<div class="red">
    <div id="facebook"><a href="https://www.facebook.com/closet magico" target="none" class="fa fa-facebook"></a></div>
    <div id="instagram"><a href="https://www.instagram.com/" class="fa fa-instagram"></a></div>
    <div id="whatsapp"><a href="#" class="fa fa-whatsapp"></a></div>
    <div id="correo"><a href="#" class="fa fa-envelope"></a></div>
</div>
<header>
    <nav class="navegacion">
        <ul class="menu">
            <li class="lista"><a href="admin_dashboard.php">PERFIL</a></li>
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
            <li class="lista"><a href="agregar_favorito">ver disfraces</a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="inicio">
        <h2>DISFRACES</h2>
        <div class="disfraces">
            <?php
            $sql = "SELECT disfraces.*, categorias.nombre AS categoria_nombre 
                    FROM disfraces 
                    JOIN categorias ON disfraces.categoria_id = categorias.id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="tarjeta">';
                    echo '<div class="delante">';
                    echo '<img src="' . $row["imagen"] . '" alt="' . $row["nombre"] . '">';
                    echo '<h3>' . $row["nombre"] . '</h3>';
                    echo '<p>' . $row["categoria_nombre"] . '</p>';
                    echo '</div>';
                    echo '<div class="atras">';
                    echo '<p>' . $row["descripcion"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No se encontraron disfraces.";
            }
            $conn->close();
            ?>
        </div>
    </section>
</main>
</body>
</html>
