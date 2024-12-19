<?php 
include 'dbc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //variaveis "v" serão preenchidas pelas variaveis que o formulario de EXTERNOS NÃO ALUNOS conter!
    $v = $_POST['v'];

    if (!empty($v)){
        try {

            $stmt = $pdo->prepare("INSERT INTO Formulario (v) VALUES (:v)");

            $stmt->bindParam(':v', $v);

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