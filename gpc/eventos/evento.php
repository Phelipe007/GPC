<!DOCTYPE html>
<html lang='pt-BR'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Eventos</title>
</head>
<body>
    <header>
        <h1>Eventos</h1>
    </header>
    
        <section>
        
        <?php 
           include 'C:\xampp\htdocs\gpc\dbc.php';
       
           try {
               // Criando a consulta SQL
               $sql = "SELECT * FROM Eventos";

               // Prepare e execute a consulta
               $stmt = $pdo->prepare($sql);

               if ($stmt->execute()) {
                   // Armazene os resultados em um array
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        print "
                            <div class='container'>

                            <label>Nome:" . $row['nome'] . " </label>
                            <br>

                            <label>Data: " . $row['data'] . " </label>
                            <br>

                            <label>horario: " . $row['horario'] . " </label>
                            <br>

                            <label>Local: " . $row['local'] . " </label>
                            <br>

                            <label>Percurso: " . $row['percurso'] . " </label>
                            <br>

                            <label>Detalhes do Evento: " . $row['descricao'] . " </label> <br>
                            <br>

                        </div>" ;
                    }
                }
            } catch (PDOException $e) {
               die("Erro: " . $e->getMessage());
            }
        ?>

        <?php 
                
        ?>

        </section>
        <footer>
            <p>&copy; 2025 Passeio Ciclístico.</p>
        </footer>
</body>
</html>