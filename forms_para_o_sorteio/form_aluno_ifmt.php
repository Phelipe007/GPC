<?php 
include 'dbc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //variaveis "i" serão preenchidas pelas variaveis que o formulario de ALUNOS IFMT contiver!
    $i = $_POST['i'];

    if (!empty($i)){
        try {

            $stmt = $pdo->prepare("INSERT INTO Formulario (i) VALUES (:i)");

            $stmt->bindParam(':i', $i);

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