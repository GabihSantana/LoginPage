<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: Inicio.php?erro=true');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Estilo/CSS.css" />

    <title>Informações</title>
</head>
<body>
    <div class="Login">
        <?php
            echo "<h1>Olá {$_SESSION['usuario']}! </h1><br>";
        ?>
    <p>Por favor, insira algumas informações sobre você!</p>
    <form action="" method="get">
        <label>
            Insira seu filme favorito: <br>
            <input type="text" name="inpFilme" required /> <br>
        </label>
        <label>
            <br>
            Insira sua música favorita: <br>
            <input type="text" name="inpMusica" required /> <br>
        </label>
        <label>
            <br>
            Insira seu livro favorito: <br>
            <input type="text" name="inpLivro" required /><br>
        </label>
        <p>
            <input type="submit" value="Enviar" name="btnEnviar">
        </p>
    </form>
    </div>
    <?php
            if(isset($_GET['btnEnviar'])){
                $_SESSION['filme'] = $_GET['inpFilme'];
                $_SESSION['musica'] = $_GET['inpMusica'];
                $_SESSION['livro'] = $_GET['inpLivro'];
                header("Location: preferencias.php");
            }
            
        
        ?>
</body>
</html>
