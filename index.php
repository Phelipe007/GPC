<?php 
include 'dbc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($usuario || $senha != NULL) {
        try {

            $stmt = $pdo->prepare("SELECT * FROM Usuario WHERE email = '$email' AND senha = '$senha' ");

            if ($stmt->execute()) {
                echo "<script> alert('Login Realizado Com Sucesso') </script>";
                //header('Location: cadastro.html');
            } else {
                echo "<script> alert('Não Foi Possivel Realizar o Login') </script>";
            }

        } catch (PDOException $e) {
            die("Erro: " . $e->getMessage());
        }
    } else { 
        echo "<script> alert('É necessario responder todos os campos!')";
    }
}
