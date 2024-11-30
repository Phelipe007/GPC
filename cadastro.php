<?php
/**
* // declarar variáveis externas
* @var $pdo
*/
include 'dbc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $ifmt = $_POST['ifmt'];
    $idade = $_POST['idade'];

    if ($usuario || $senha || $email || $telefone || $cpf != NULL) {

        try {

            $stmt = $pdo->prepare("INSERT INTO Usuario (nome, telefone, email, senha, cpf, ifmt, idade) VALUES (:nome, :telefone, :email, :senha, :cpf, :ifmt, :idade)");

            $stmt->bindParam(':nome', $nome); 
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':ifmt', $ifmt);
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
?>