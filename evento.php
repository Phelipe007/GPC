<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
</head>
<body>
    <header>
        <h1>Paseio ciclistico</h1>
    </header>
    
        <section>

            <div class="container">

                <h2>Data e Horário</h2>
                <p>Data: </p>
                <p>Horario: </p>

                <h2>Local</h2>
                <p>Data: </p>

                <h2>Trajeto</h2>
                <p>Percuso: </p>

                <h2>Detalhes do Evento</h2>

                <p></p>
        
                <input type="submit" value="Inscrever-se">
                <p>Se inscreva para não perder esse dia incrível.</p>
        

            </div>
    
        </section>
        <footer>
            <p>&copy; 2025 Passeio Ciclístico.</p>
        </footer>
    

</body>
</html>



<?php
function salvaNoBanco($tabela, $valores) {
    include "dbc.php";

    // Construindo a query
    $sql = "SELECT " . implode(", " , $valores) . "FROM $tabela";

    try {
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            return $r = true . $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    } catch (PDOException $e) {
        die("Erro: " . $e->getMessage());
    }
}
?>
