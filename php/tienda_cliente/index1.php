<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header("Location: ./inicio_sesion.html");
    exit;
}

// Obtener el correo electrónico del usuario desde la sesión
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Closet Magico</title>
    <link rel="icon" href="../img/CLOSET-MAGICO-OP-2-removebg-preview.png">
    <script src="https://use.fontawesome.com/502b7294a9.js"></script>
    <link rel="stylesheet" href="../css/redes.css">
    <link rel="stylesheet" href="../css/adri.css">
</head>

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
                <li class="lista"><a href="index1.php">PERFIL</a>
                </li>
                <li class="lista"><a href="favoritos.html">FAVORITOS</a>             
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

                <li class="lista"><a href="#">CATEGORIAS</a>
                    <ul class="submenu">
                        <li><a href="halloween.html">HALLOWEEN</a></li>
                        <li><a href="folclor.html">FOLCLOR</a></li>
                        <li><a href="fantasia.html">FANTASIA</a></li>
                    </ul>
                </li>

                <li class="lista"><a href="final.html">ALQUILER</a>
                    <ul class="submenu">
                        <li>
                            
                            <br>Comunicate con nosotros para alquilar un disfraz
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <script>
        function mostrarMensaje(event) {
            event.preventDefault(); 
            document.getElementById('mensajeConfirmacion').style.display = 'block';
        }

        document.querySelectorAll('.lista').forEach(function(lista) {
            lista.addEventListener('mouseenter', function() {
                clearTimeout(lista.hideTimeout);
                lista.querySelector('.submenu').style.display = 'block';
            });
            lista.addEventListener('mouseleave', function() {
                lista.hideTimeout = setTimeout(function() {
                    lista.querySelector('.submenu').style.display = 'none';
                }, 300); 
            });
            lista.querySelector('.submenu').addEventListener('mouseenter', function() {
                clearTimeout(lista.hideTimeout);
            });
            lista.querySelector('.submenu').addEventListener('mouseleave', function() {
                lista.hideTimeout = setTimeout(function() {
                    lista.querySelector('.submenu').style.display = 'none';
                }, 300); 
            });
        });
    </script>
</body>

<section>
    <h2>Bienvenid@</h2>
    <p>Has iniciado sesión como <strong><?php echo htmlspecialchars($email); ?></strong></p>
    <a href="../logout.php">Cerrar Sesión</a>
</section>

</html>
