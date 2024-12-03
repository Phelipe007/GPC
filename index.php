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

            // Verifica se há resultados
            $usuario = $stmt->fetch();
            if ($usuario) {
                echo "<script>alert('Login Realizado Com Sucesso');</script>";
                
            } else {
                //sleep(1);
                echo "<script>alert('Senha ou Usuario Incorretos');</script>";
                $i = true;
                    if ($i == true){
                        header('location: index.html');
                        exit;
                    } 
            }
        } catch (PDOException $e) {
            die("Erro: " . $e->getMessage());
        }
    } else {
        echo "<script>alert('É necessário responder todos os campos!');</script>";
    }
}
