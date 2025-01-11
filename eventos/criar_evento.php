<?php

//incluindo a função salvardados()
include 'C:\xampp\htdocs\gpc\salvarDados.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $tabela = "Eventos";

    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $local = $_POST['local'];
    $percurso = $_POST['percurso'];
    $descricao = $_POST['descricao'];

    //Enviando os valores do cadastro para o banco com a função salvaNoBanco()
    $r = salvarDados($tabela, ['data', 'horario', 'local', 'percurso', 'descricao'], [$data, $horario, $local, $percurso, $descricao]);

    //Se for bem sucedida redirecionando para a pagina de login
    if ($r == true){
        echo "<script> alert('Criado com sucesso') </script>";
        exit(); //apenas para evitar que o script entre em loop
    }
} else {
    print('não foi');
}
?>