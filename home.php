<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Eventos</title>
</head>
<body>
    <header>
        <div class="header">
            <h1>Eventos</h1>
            <button class="menu-toggle" id="menuToggle">☰</button>  <!-- Ícone do menu -->
            <div class="user-icon"><a href="perfil.php">👤</a> </div>  <!-- Ícone de perfil -->
        </div>
    </header>

    <aside class="sidebar" id="sidebar">
        <ul>
            <li><a href="perfil.php">Meu Perfil</a></li>
            <li><a href="#">Formulários</a></li>
            <li><a href="sair.php">Sair</a></li>
        </ul>
    </aside>

    <section>
        <main class='content'>
            <div class='event-grid'>
                <?php 
                include 'dbc.php';
                session_start();

                try {
                    // Criando a consulta SQL
                    $sql = "SELECT * FROM Eventos";

                    // Prepare e execute a consulta
                    $stmt = $pdo->prepare($sql);

                    if ($stmt->execute()) {
                        // Armazene os resultados em um array
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            // Salvar o id do evento na sessão
                            $_SESSION['id_evento'] = $row['id_evento'];

                            // Exibir os dados do evento
                            print "
                            <a href='eventos/evento.php?id_evento=" . $row['id_evento'] . "'>
                                <div class='event-card'>
                                    <h3>" . $row['nome'] . "</h3>
                                    <img src='imagens/" . $row['imagem'] . "' alt='Foto do Evento' class='event-img'>
                                    <p><strong>Data: </strong>" . $row['data'] . "</p>
                                    <p><strong>Local: </strong>" . $row['local'] . "</p>
                                    <p><strong>Descrição: </strong>" . $row['descricao'] . "</p>
                                </div>
                            </a>
                            " ;
                        }
                    }
                } catch (PDOException $e) {
                die("Erro: " . $e->getMessage());
                }
                ?>
                </div>
              </main>
          </section>
      <script src="home.js"></script>
  </body>
  </html>
  

