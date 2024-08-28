<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Closet Magico</title>
    <link rel="icon" href="../img/CLOSET-MAGICO-OP-2-removebg-preview.png">
    <link rel="stylesheet" href="css/estilohall.css">
    <script src="https://use.fontawesome.com/502b7294a9.js"></script>
    <link rel="stylesheet" href="css/redes.css">
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
                <li class="lista"><a href="index1.php">PERFIL</a></li>
                <li class="lista"><a href="favoritos.html">FAVORITOS</a></li>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-frown" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.5 3.5 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.5 4.5 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5"/>
                            </svg>
                            <br>LO SENTIMOS NO HAS ALQUILADO NINGUN DISFRAZ
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <section>
        <h2>HALLOWEEN</h2>
        <?php
        session_start(); // Asegúrate de iniciar la sesión al principio del archivo
        include 'conexion.php';

        $sql = "SELECT * FROM disfraces WHERE categoria_id='1'";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="card" style="width: 18rem;">
                    <img src="./img/21.png' . $row["imagen"] . '" class="card-img-top" alt="' . $row["nombre"] . '">
                    <div class="card-body">
                        <h5 class="card-title">' . $row["nombre"] . '</h5>
                    </div>
                    <ul class="list-group list-group-flush">';
                $caracteristicas = explode(',', $row["descripcion"]);
                foreach ($caracteristicas as $caracteristica) {
                    echo '<li class="list-group-item">' . $caracteristica . '</li>';
                }
                echo '</ul>
                    <div class="card-body">';
                
                if (isset($_SESSION['id_cliente'])) {
                    // Mostrar el enlace para agregar a favoritos
                    echo '<a href="favorito.php?id_disfraz=' . $row["id"] . '" class="card-link agregar-favoritos">Agregar a favoritos</a>';
                } else {
                    // Mostrar mensaje de que el usuario necesita iniciar sesión
                    echo '<a href="favorito.php?id_disfraz=' . $row["id"] . '" class="card-link agregar-favoritos">Agregar a favoritos</a>';
                }

                echo '</div></div>';
            }
        } else {
            echo '<p>No se encontraron disfraces para Halloween.</p>';
        }
        $conexion->close();
        ?>
    </section>
    
<script>
    document.querySelectorAll('.pagina-item a').forEach(item => {
        item.addEventListener('click', event => {
            document.querySelectorAll('.pagina-item').forEach(el => el.classList.remove('active'));
            event.currentTarget.parentElement.classList.add('active');
        });
    });
</script>
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

<div class="paginacion">
    <ul>
        <li class="pagina-item"><a href="halloween.html"></a></li>
        <br>
        <li class="pagina-item"><a href="halloween2.html"></a></li>
        <br>
        <li class="pagina-item"><a href="halloween3.html"></a></li>
        
    </ul>
</div>

</html>
