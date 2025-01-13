<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="evento.css">
    <title>Evento</title>
</head>
<body>
    <header>
        <div class="header">
            <h1>Eventos</h1>
            <button class="menu-toggle" id="menuToggle">☰</button>  <!-- Ícone do menu -->
            <div class="user-icon"><a href="perfil.php">👤</a></div>  <!-- Ícone de perfil -->
        </div>
    </header>

    <aside class="sidebar" id="sidebar">
        <ul>
            <li><a href="../home.php">Home</a></li>
            <li><a href="perfil.php">Meu Perfil</a></li>
            <li><a href="#">Formulários</a></li>
            <li><a href="sair.php">Sair</a></li>
        </ul>
    </aside>

    <section>
        <main class='content'>
            <div class='event-grid'>
                <?php
                include '../dbc.php';
                session_start();

                // Verificar se o ID do evento foi enviado via GET
                if (isset($_GET['id_evento'])) {
                    $_SESSION['id_evento'] = $_GET['id_evento']; // Atualiza a variável de sessão
                }

                if (isset($_SESSION['id_evento'])) {
                    $id_evento = $_SESSION['id_evento'];
                    try {
                        // Consulta SQL
                        $sql = "SELECT * FROM Eventos WHERE id_evento = :id_evento";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':id_evento', $id_evento, PDO::PARAM_INT);

                        if ($stmt->execute()) {
                            $eventoEncontrado = false;

                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $eventoEncontrado = true;

                                echo "
                                <div class='event-card'>
                                    <h3>" . $row['nome'] . "</h3>
                                    <img src='" . $row['imagem'] . "' alt='Foto do Evento' class='event-img'>
                                    <p><strong>Data: </strong>" . $row['data'] . "</p>
                                    <p><strong>Local: </strong>" .  $row['local'] . "</p>
                                    <p><strong>Descrição: </strong>" . $row['descricao'] . "</p>
                                </div>";
                            }

                            if (!$eventoEncontrado) {
                                echo "<p>Nenhum evento encontrado para o ID fornecido.</p>";
                            }
                        } else {
                            echo "<p>Erro ao buscar o evento no banco de dados.</p>";
                        }
                        
                    } catch (PDOException $e) {
                        die("<p>Erro: " . $e->getMessage() . "</p>");
                    }
                } else {
                    echo "<p>Nenhum evento selecionado. Por favor, selecione um evento.</p>";
                }
                ?>
            </div>
        </main>
    </section>
    <script src="evento.js"></script>
</body>
</html>

