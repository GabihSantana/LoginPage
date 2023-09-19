<?php
    session_start();
    echo "Valor do Cookie: " . $_COOKIE['Data_login'];
    //print_r($_SESSION['Data_login']);

    if(!isset($_SESSION['usuario'])){
        header('Location: Inicio.php?erro=true');
        exit;
    }
    if (!isset($_SESSION['tentativas'])) {
        $_SESSION['tentativas'] = 1;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Estilo/CSS.css" />

    <title>Verificação</title>
</head>
<body>
    <div class="Login">
        <form action="" method="post">
            <label>
                Insira o seu nome: <br>
                <input type="text" name="inpNome" required /> <br>
            </label>
            <label>
                <br>
                Usuário: <br>
                <input type="text" name="txtUsuario" required>
                <br>
            </label>     
            <label>
                <br>
                Senha:<br>
                <input type="password" name="txtSenha" required>
            </label>
            <p>
            <input type="submit" value="Salvar" name="btnSalvar">
            </p>
        </form>
    </div>
<?php
    if(isset($_POST["btnSalvar"])){
        $usuarioInserido = $_POST["txtUsuario"];
        $senhaInserida = $_POST["txtSenha"];
        $_SESSION['nome'] = $_POST['inpNome'];

        if($_SESSION['tentativas'] == 3){
            header("Location: Inicio.php?invalidação=true");
            exit;
        }
        elseif($senhaInserida != $_SESSION['senha'] || $usuarioInserido != $_SESSION['usuario']){
            echo "<div class='aviso'>";
            echo "Usuário/senha inválido(s)!";
            echo "</div>";
            $_SESSION['tentativas']++;            
        }
        
        else{
            header("Location: informações.php");
            exit;
        }
    }
?>
</body>
</html>