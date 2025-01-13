<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="perfil.css">
    <script src="perfil.js" defer></script>
    <title>Perfil de Usuario</title>
</head>
<body>
    <div class="header">
        <h1>Perfil de Usuario</h1>
        <button class="menu-toggle" id="menuToggle">☰</button>  <!-- Ícone do menu -->
        <div class="user-icon">👤</div>  <!-- Ícone de perfil -->
    </div>
        

    <!-- Sidebar com id sidebar -->
    <aside class="sidebar" id="sidebar">
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="#">Formulários</a></li>
            <li><a href="sair.php">Sair</a></li>
        </ul>
    </aside>
    <section>
        <?php 
        include 'dbc.php';
    
        try {
            session_start();
            $id_usuario = $_SESSION['id_usuario'];
            
            // Criando a consulta SQL
            $sql = "SELECT * FROM Usuario WHERE id_usuario = $id_usuario";

            // Prepare e execute a consulta
            $stmt = $pdo->prepare($sql);

            if ($stmt->execute()) {
                // Armazene os resultados em um array
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        print "
                        <!-- Main Content -->
                        <div class='main-content'>
                            <div class='profile-section'>
                                <h2>Dados do Perfil</h2>
                                <div class='profile-picture'>
                                    <img src='imagens/" . $row['imagem'] . "' alt='Foto de Perfil'>
                                    <div class='profile-info'>
                                        <form>
                                            <div class='form-group'>
                                                <label for='name'>Nome: " . $row['nome'] . "</label>
                                            </div>
                                            <div class='form-group'>
                                                <label for='email'>E-mail: " . $row['email'] . "</label>
                                            <div class='form-group'>
                                                <a href='editar_perfil.php'>
                                                    <button type='button'>Editar dados</button>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }
                }
            } catch (PDOException $e) {
            die("Erro: " . $e->getMessage());
            }
        ?>
    </section>
</body>
</html>
