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
    <title>Preferencias do usuário</title>
</head>
<body>
    <div class="Preferencias">
<?php
    /*$_SESSION['filme'] = $_GET['inpFilme'];
    $_SESSION['musica'] = $_GET['inpMusica'];
    $_SESSION['livro'] = $_GET['inpLivro'];*/

    echo "<h3>Informações do Usuário </h3>";
    echo "<strong>Usuário: </strong>" . $_SESSION['usuario'] . "<br>";
    echo "<strong>Senha: </strong>" . $_SESSION['senha'] . "<br>";

    echo "<strong>Nome: </strong>" . $_SESSION['nome'] . ".<br>";

    echo "<hr>";
    echo "<h3>Preferências do usuário: </h3>";
    echo "<hr>";
    echo "<strong>Filme: </strong>" . $_SESSION['filme'] . ".<br>";
    echo "<strong>Música: </strong>" . $_SESSION['musica'] . ".<br>";
    echo "<strong>Livro: </strong> " . $_SESSION['livro'] . ".<br>";
    echo "<hr>";
?>
    <form action="">
        <input type="submit" value="Logout" name="btnLogout">
    </form>
</div>
<?php
    if(isset($_GET['btnLogout'])){
        echo "<script>";
        echo "const confirmacao = 'Você tem certeza que deseja sair?';";
        echo "if (confirm(confirmacao)) {";
        echo "window.location.href = 'logout.php';";
        echo "}";
        echo "</script>";
        }

        /*echo "Limpando os valores";
        session_unset();
        session_destroy();
        header('Location: Inicio.php');
        exit;*/
?>
</body>
</html>
