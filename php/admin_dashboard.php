

<?php
session_start();

// Verificar si el usuario ha iniciado sesión y es un administrador
if (!isset($_SESSION['user_id']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../inicio_sesion.html");
    exit;
}

// Conexión a la base de datos
include 'conexion.php';

// Ejemplo de operaciones CRUD para los disfraces
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Manejar las operaciones de creación, actualización, eliminación aquí
}

// Obtener lista de disfraces
$query = "SELECT * FROM disfraces";
$result = $conexion->query($query);
$email = $_SESSION['rol'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="../css/adri.css">

    <style>
        h2{
            text-align:center;
            color: #000;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            width: 80%;
            margin-left:50px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        a {
            text-decoration: none;
            color: #9B5BA7;
        }
        a:hover {
            text-decoration: underline;
        }
        .button {
            background-color: #9B5BA7;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #7b4794;
        }
    </style>
</head>

<body>
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
    <section>
        <h2>Bienvenid@</h2>
        <p>Has iniciado sesión como <strong><?php echo htmlspecialchars($email); ?></strong></p>
        <a href="logout.php">Cerrar Sesión</a>
    </section>
    
    <div class="container">
    <h2>Panel de Administración</h2>
        <h3>Lista de Disfraces</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td>
                        <a href="editar_disfraz.php?id=<?php echo $row['id']; ?>" class="button">Editar</a>
                        <a href="eliminar_disfraz.php?id=<?php echo $row['id']; ?>" class="button">Eliminar</a>
                        <a href="agregar_disfraz.php" class="button">Agregar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>

</html>
