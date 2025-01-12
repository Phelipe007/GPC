// Seleção do botão de menu e da sidebar
const menuToggle = document.getElementById('menuToggle');
const sidebar = document.getElementById('sidebar');

// Toggle da classe 'open' para abrir/fechar a sidebar
menuToggle.addEventListener('click', () => {
    sidebar.classList.toggle('open');
});

// Fechar a sidebar ao clicar fora dela
document.addEventListener('click', (event) => {
    const isClickInsideSidebar = sidebar.contains(event.target);
    const isClickOnToggle = menuToggle.contains(event.target);

    if (!isClickInsideSidebar && !isClickOnToggle) {
        sidebar.classList.remove('open');
    }
});