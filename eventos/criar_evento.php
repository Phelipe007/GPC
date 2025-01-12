<?php

//incluindo a função salvardados()
include 'C:\xampp\htdocs\gpc\salvarDados.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $tabela = "Eventos";

    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $local = $_POST['local'];
    $percurso = $_POST['percurso'];
    $descricao = $_POST['descricao'];

    //Enviando os valores do cadastro para o banco com a função salvaNoBanco()
    $r = salvarDados($tabela, ['nome', 'data', 'horario', 'local', 'percurso', 'descricao'], [$nome, $data, $horario, $local, $percurso, $descricao]);

    //Se for bem sucedida redirecionando para a pagina de login
    if ($r == true){
        echo "<script> alert('Evento criado com sucesso'); </script>";
        echo "<script> window.location.href = 'evento.php'; </script>";
        exit(); //apenas para evitar que o script entre em loop
    }
} else {
    print('não foi');
}
?>