<?php 

@var $pdo;

include "dbc.php";

function salvaNoBanco($tabela, $campos, $valores){
    $sql = "INSERT INTO $tabela(";

    for($i=0;$i<count($campos);$i++){
        $sql = $sql . $campos[$i] . ", ";
    }

    $sql = $sql . ") VALUES (";

    for($i=0;$i<count($campos);$i++){
        $sql = $sql . ":" . $campos[$i] . ", ";
    }

    $sql = substr($sql, 0,strlen($sql)-2) . ")";
    if (!empty($campos)){
        try {

            $stmt = $pdo->prepare($sql);

            for($i=0;$i<count($valores);$i++){
                $stmt->bindParam(':'. $campos[$i], $valores[$i]);
            }

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