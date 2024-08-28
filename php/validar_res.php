<?php
session_start();
include 'conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM clientes WHERE email = ?";
    if ($stmt = $conexion->prepare($query)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['rol'] = $user['rol'];
                
                if ($user['rol'] == 'admin') {
                    header("Location: admin_dashboard.php");
                } else {
                    header("Location: tienda_cliente/index1.php");
                }
                exit;
            } else {
                $error = "Contraseña incorrecta.";
            }
        } else {
            $error = "El correo electrónico no está registrado.";
        }
        $stmt->close();
    }
    $conexion->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error de Inicio de Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        h2 {
            color: #9B5BA7;
            margin-bottom: 20px;
        }
        p {
            color: #ff0000;
            font-weight: bold;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #9B5BA7;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #7b4794;
        }
    </style>
</head>
<body>
    <h2>Error de Inicio de Sesión</h2>
    <p><?php echo isset($error) ? $error : ''; ?></p>
    <a href="../inicio_sesion.html">Volver a Intentarlo</a>
</body>
</html>
