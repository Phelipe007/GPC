<?php

//ncluindo a função salvaNoBanco()
include 'salvarDados.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $tabela = "Usuario";

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $ifmt = $_POST['ifmt'];
    $idade = $_POST['idade'];

    //Enviando os valores do cadastro para o banco com a função salvaNoBanco()
    $r = salvarDados($tabela, ['nome', 'senha', 'email', 'telefone', 'cpf', 'ifmt', 'idade'], [$nome, $senha, $email, $telefone, $cpf, $ifmt, $idade]);

    //Se for bem sucedida redirecionando para a pagina de login
    if ($r == true){
        echo "<script> window.location.href = 'index.html'; </script>"; //redirecionamento com JS
        exit(); //apenas para evitar que o script entre em loop
    }
}
?>