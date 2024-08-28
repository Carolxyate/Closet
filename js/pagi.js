document.querySelectorAll('.pagina-item a').forEach(item => {
    item.addEventListener('click', event => {
        document.querySelectorAll('.pagina-item').forEach(el => el.classList.remove('active'));
        event.currentTarget.parentElement.classList.add('active');
    });
});
