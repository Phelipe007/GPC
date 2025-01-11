<?php
function BuscaDados($tabela, $valores) {
    include "dbc.php";

    // Array para armazenar os resultados
    $dados = [];

    try {
        // Criando a consulta SQL
        $sql = "SELECT * FROM $tabela";

        // Prepare e execute a consulta
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            // Armazene os resultados em um array
            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        die("Erro: " . $e->getMessage());
    }

    // Retornando os dados
    return $dados;
}
?>
