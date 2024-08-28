<?php
session_start();

if ($usuarioValido) {
    $_SESSION['usuario'] = $usuario;
    header('Location: index1.php');
} else {
    header('Location: inicio_sesion.html?error=1');
}
?>
