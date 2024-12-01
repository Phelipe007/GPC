<?php 
include 'dbc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (!empty($email) && !empty($senha)) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM Usuario WHERE email = :email AND senha = :senha");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();

            $usuario = $stmt->fetch(); // Verifica se há resultados
            if ($usuario) {
                echo "<script>alert('Login Realizado Com Sucesso');</script>";
                // header('Location: cadastro.html'); // Descomente se necessário
            } else {
                echo "<script>alert('Não Foi Possível Realizar o Login');</script>";
            }
        } catch (PDOException $e) {
            die("Erro: " . $e->getMessage());
        }
    } else {
        echo "<script>alert('É necessário responder todos os campos!');</script>";
    }
}
