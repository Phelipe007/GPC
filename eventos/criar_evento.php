<?php

//incluindo a função salvaNoBanco()
include 'salvarNoBanco.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $tabela = "Usuario";

    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $local = $_POST['local'];
    $trajeto = $_POST['trajeto'];
    $detalhes_do_evento = $_POST['detalhes_do_evento'];

    //Enviando os valores do cadastro para o banco com a função salvaNoBanco()
    $r = salvaNoBanco($tabela, ['data', 'horario', 'local', 'trajeto', 'detalhes_do_evento'], [$data, $horario, $local, $trajeto, $detalhes_do_evento]);

    //Se for bem sucedida redirecionando para a pagina de login
    if ($r == true){
        echo "<script> alert('Criado com sucesso') </script>";
        exit(); //apenas para evitar que o script entre em loop
    }
}
?>