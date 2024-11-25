<?php 
include 'dbc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['CPF'];
    $IFMT = $_POST['IFMT'];
    $idade = $_POST['idade'];

    if ($usuario || $senha || $email || $telefone || $cpf != NULL) {

        try {

            $stmt = $pdo->prepare("INSERT INTO usuario (Nome, Telefone, Email, Senha, CPF, IFMT, Idade) VALUES (:usuario, :telefone, :email, :senha, :cpf, :IFMT, :idade)");

            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':IFMT', $IFMT);
            $stmt->bindParam(':idade', $idade);

            if ($stmt->execute()) {
                echo "<script> alert('Cadastro Realizado Com Sucesso') </script>";
            } else {
                echo "<script> alert('Não Foi Possivel Realizar o Cadastro') </script>";
            }

        } catch (PDOException $e) {
            die("Erro: " . $e->getMessage());
    }
    } else {
        echo "<script> alert('É necessario responder todos os campos obrigatorios!')";
    }

}
