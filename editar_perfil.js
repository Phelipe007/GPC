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

// Função para ativar o input de imagem ao clicar na área da imagem de perfil
const profileImageContainer = document.querySelector('.profile-image-container');
const imageInput = document.getElementById('imageInput');

// Quando o usuário clicar na imagem, o input de arquivo será ativado
profileImageContainer.addEventListener('click', () => {
    imageInput.click();
});

// Função para atualizar a imagem
imageInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const profileImage = document.querySelector('.profile-image');
            profileImage.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
