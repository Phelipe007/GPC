<?php 
function salvarImagem($imagemNome) {
    if (isset($_FILES['imagem']) && !empty($_FILES['imagem'])) {
        // Nome do arquivo
        $imagemNome = $_FILES['imagem']['name'];  
        // Caminho para salvar a imagem
        $imagemCaminho = "../imagens/" . $imagemNome;  
        
        // Verifica se o upload foi bem-sucedido
        if (move_uploaded_file($_FILES['imagem']["tmp_name"], $imagemCaminho)) {
            return $imagemNome;
        } else {
            echo "Erro ao carregar a imagem.";
            return null;  // Retorna null se houver erro no upload
        }
    } else {
        return null;  // Retorna null se não houver imagem
    }
}

?>