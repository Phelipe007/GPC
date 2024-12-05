<?php

//ncluindo a função salvaNoBanco()
include 'salvarNoBanco.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $tabela = "Usuario";

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $ifmt = $_POST['ifmt'];
    $idade = $_POST['idade'];

    //enviarndo os valores do cadastr para o banco com a função salvaNoBanco(), e se for bem sucedida redirecionando para a pagina de login
    if ($r = salvaNoBanco($tabela, ['nome', 'senha', 'email', 'telefone', 'cpf', 'ifmt', 'idade'], [$nome, $senha, $email, $telefone, $cpf, $ifmt, $idade]));{
        echo "<script> window.location.href = 'index.html'; </script>"; //redirecionamento com JS
        exit(); //apenas para evitar que o script entre em loop
    }
}
?>