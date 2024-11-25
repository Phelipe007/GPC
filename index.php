<?php 
include 'dbc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    if ($usuario || $senha != NULL) {

        try {

            $stmt = $pdo->prepare("INCLUDE INTO ()");
        }

    }

}
