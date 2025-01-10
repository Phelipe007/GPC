<!DOCTYPE html>
<html lang='pt-BR'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Eventos</title>
</head>
<body>
    <header>
        <h1>Paseio ciclistico</h1>
    </header>
    
        <section>

        <form action='evento.php  method='POST'>
            <div class= container >

                <label>Nome: </label>
                <input type= text' name='nome' id='nome'> 
                <br>

                <label>Data: </label>
                <input type='date' name='data' id='data'> 
                <br>
                
                <label>horario: </label>
                <input type='time' name='horario' id='horario'>
                <br>

                <label>Local: </label>
                <input type='text' name='local' id='local' placeholder='Digite o local do evento'>
                <br>

                <label>Trajeto: </label>
                <input type='text' name='trajeto' id='trajeto' placeholder='Inicio - Fim'>
                <br>

                <label>Detalhes do Evento: </label> <br>
                <textarea name='detalhes_do_evento' id='detalhes_do_evento' cols='30' rows='5'></textarea>
                <br>

                <input type='submit' value='BUSCAR'>
                <p>Se inscreva para não perder esse dia incrível.</p>

            </div>
            </form>
        <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                include('buscaDados.php');
                
                $data = $_POST['data'];
                
                $dados = [];

                $dados = BuscaDados("Eventos", $data);
            }
        ?>

        <?php 
            echo "<label>Nome: " . $dados[0]['nome'] . "</label>" ;
        ?>

        </section>
        <footer>
            <p>&copy; 2025 Passeio Ciclístico.</p>
        </footer>
</body>
</html>