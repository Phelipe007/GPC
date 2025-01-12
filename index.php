<?php 
include 'dbc.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (!empty($email) && !empty($senha)) {
        try {
            // Prepara a consulta para buscar o usuário
            $stmt = $pdo->prepare("SELECT * FROM Usuario WHERE email = :email AND senha = :senha");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();

            // Verifica se há resultados
            $usuario = $stmt->fetch();
            if ($usuario) {
                // Salva o ID do usuário na sessão de forma segura
                $_SESSION['id_usuario'] = $usuario['id_usuario'];

                // Exibe mensagem de sucesso e redireciona para a página principal
                echo "<script>alert('Login Realizado Com Sucesso');</script>";
                header('Location: home.html');
                exit;
            } else {
                // Caso as credenciais estejam erradas
                echo "<script>alert('Senha ou Usuário Incorretos');</script>";
                exit;
            }
        } catch (PDOException $e) {
            die("Erro: " . $e->getMessage());
        }
    } else {
        // Caso os campos de e-mail ou senha estejam vazios
        echo "<script>alert('É necessário responder todos os campos!');</script>";
    }
}
