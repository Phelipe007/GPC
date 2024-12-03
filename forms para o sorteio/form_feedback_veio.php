<?php 
include 'dbc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //variaveis "coringa" serão ocupadas pelas variaveis que o formulario de FEEDBACKS VEIO conter!
    $coringa = $_POST['coringa'];

    if (!empty($coringa)){
        try {

            $stmt = $pdo->prepare("INSERT INTO Formulario (coringa) VALUES (:coringa)");

            $stmt->bindParam(':coringa', $coringa);

            if ($stmt->execute()){
                echo "<script> alert('Formulario Enviado Com Sucesso!') </script>";
            } else {
                echo "<script> alert('Formulario Não Enviado!') </script>"; 
            }
            
        } catch (PDOException $e) {
            die ("Erro: " . $e->getMessage());
        }
    } else {
        echo "Preencha Todos os Campos!";
    }
}

?>