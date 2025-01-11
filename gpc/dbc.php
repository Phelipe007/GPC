<?php 

$hostname = 'localhost';
$username = 'root';
$pasword = '';
$db = 'gpc';

try {
    //Criando o "PDO" e fazendo a conexão com  banco novamente
    $pdo = new PDO("mysql:host=$hostname;dbname=$db;charset=utf8", $username, $pasword);

    //Atribuindo os Tipos de Erros
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die ("Erro ao Implementar a Conexão. ERRO: " . $e->getMessage());
}

?>