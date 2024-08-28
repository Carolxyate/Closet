document.addEventListener("DOMContentLoaded", function() {
    const enlacesFavoritos = document.querySelectorAll(".agregar-favoritos");

    enlacesFavoritos.forEach(enlace => {
        enlace.addEventListener("click", function(event) {
            event.preventDefault();
            const disfrazId = this.id.replace('favoritos', '');

            // Realizar una solicitud AJAX a PHP para agregar el disfraz a favoritos
            fetch('agregar_favorito.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ disfrazId: disfrazId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Disfraz agregado a favoritos');
                } else {
                    alert('Debes iniciar sesión para agregar a favoritos');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
