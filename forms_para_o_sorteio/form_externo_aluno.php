<?php 
include 'dbc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //variaveis "y" vão ser substituidas pelas variaveis que tiverem no formulario EXTERNOS ALUNOS!
    $v = $_POST['y'];

    if (!empty($y)){
        try {

            $stmt = $pdo->prepare("INSERT INTO Formulario (y) VALUES (:y)");

            $stmt->bindParam(':y', $y);

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