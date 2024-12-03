<?php 
include 'dbc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //Serão atribuidas as variaveis "T" os valores que o formulario de FEEDBACK NÃO VEIO conter!
    $T = $_POST['T'];

    if (!empty($T)){
        try {

            $stmt = $pdo->prepare("INSERT INTO Formulario (T) VALUES (:T)");

            $stmt->bindParam(':T', $T);

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