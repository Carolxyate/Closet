document.addEventListener('DOMContentLoaded', function() {
    const favoritesSection = document.getElementById('favorites-section');
    const noFavoritesMessage = document.getElementById('no-favorites');

    // Supongamos que los favoritos están almacenados en un array
    const favorites = getFavorites(); // Esta función debe obtener los favoritos (de localStorage, una base de datos, etc.)

    if (favorites.length === 0) {
        noFavoritesMessage.style.display = 'block';
    } else {
        noFavoritesMessage.style.display = 'none';
        favorites.forEach(favorite => {
            const favoriteElement = document.createElement('div');
            favoriteElement.classList.add('favorite-item');
            favoriteElement.innerHTML = `
                <p>${favorite.name}</p>
                <ul class="sub-men">
                    ${favorite.items.map(item => `<li>${item}</li>`).join('')}
                </ul>
            `;
            favoritesSection.appendChild(favoriteElement);
        });
    }
});

function getFavorites() {
    // Esta función debe devolver un array de objetos favoritos
    // Aquí hay un ejemplo de formato:
    return [
        {
            name: 'Muñecon Oso',
            items: ['Cabeza', 'Guantes', 'Zapatos', 'Traje']
        },
        {
            name: 'Muñecon Bowser',
            items: ['Cabeza', 'Guantes', 'Zapatos', 'Caparazon']
        },
        {
            name: 'Muñecon fh',
            items: ['Cabeza', 'Guantes', 'Zapatos', 'Caparazon']
        }
        // Añade más favoritos según sea necesario
    ];
}
