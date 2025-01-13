<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editar_perfil.css">
    <script src="editar_perfil.js" defer></script>
    <title>Perfil de Usuário</title>
</head>
<body>
    <div class="header">
        <h1>Perfil de Usuario</h1>
        <button class="menu-toggle" id="menuToggle">☰</button>  <!-- Ícone do menu -->
        <div class="user-icon">👤</div>  <!-- Ícone de perfil -->
    </div>
        
    <aside class="sidebar" id="sidebar">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="perfil.php">Meu Perfil</a></li>
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
            
            // Criando a consulta SQL com parâmetro preparado para evitar SQL Injection
            $sql = "SELECT * FROM Usuario WHERE id_usuario = :id_usuario";
            
            // Prepare a consulta
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            
            // Execute a consulta
            if ($stmt->execute()) {
                // Armazene os resultados em um array
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "
                    <!-- Main Content -->
                    <div class='main-content'>
                        <div class='profile-section'>
                            <h2>Editar e Alterar Dados do Perfil</h2>
                            <div class='profile-picture'>
                                <div class='profile-image-container'>
                                    <img src='imagens/IMG_20241215_082328549_HDR.jpg' alt='Foto de Perfil' class='profile-image'>
                                    <div class='blur-overlay'>
                                        <span>Editar Imagem</span>
                                    </div>
                                    <input type='file' id='imageInput' class='image-input' accept='image/*'>
                                </div>
                                <div class='profile-info'>
                                    <form>
                                        <div class='form-group'>
                                            <label for='name'>Nome</label>
                                            <input type='text' value='" . $row['nome'] . "' id='name' name='name' placeholder='Digite seu nome'>
                                        </div>
                                        <div class='form-group'>
                                            <label for='email'>E-mail</label>
                                            <input type='email' value='" . $row['email'] . "' id='email' name='email' placeholder='Digite seu e-mail'>
                                        </div>
                                        <div class='form-group'>
                                            <label for='password'>Senha</label>
                                            <input type='password' value='" . $row['senha'] . "' id='password' name='password' placeholder='Digite sua senha'>
                                        </div>
                                        <div class='form-group'>
                                            <button type='submit'>Salvar Alterações</button>
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
