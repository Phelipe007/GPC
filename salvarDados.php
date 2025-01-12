<?php
function salvarDados($tabela, $campos, $valores) {
    include "dbc.php";

    // Verificação para saber se eles estão alinhados
    if (count($campos) !== count($valores)) {
        die("<script> alert(Erro: O número de campos e valores não corresponde.) </script>");
    }

    // Construindo a query
    $sql = "INSERT INTO $tabela (" . implode(", ", $campos) . ") VALUES (";
    $sql .= ":" . implode(", :", $campos) . ")";

    try {
        $stmt = $pdo->prepare($sql);

        // Associando os valores
        for ($i = 0; $i < count($campos); $i++) {
            $stmt->bindParam(":" . $campos[$i], $valores[$i]);
        }

        if ($stmt->execute()) {
            return $r = true;
        } else {
            echo "<script> alert('Erro ao enviar formulário.') </script>";
        }
    } catch (PDOException $e) {
        die("Erro: " . $e->getMessage());
    }
}
?>
