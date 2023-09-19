<?php
    session_start();
    if(isset($_GET['erro'])){
        echo "<script>";
        echo "const erro = 'Você precisa logar no sistema primeiro!';";
        echo "alert(erro)";
        echo "</script>";
    }
    elseif(isset($_GET['invalidação'])){
        session_unset();
        echo "<script>";
        echo "const invalidação = 'Você precisa realizar o Cadastro!';";
        echo "alert(invalidação)";
        echo "</script>";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Estilo/CSS.css" />

    <title>Login Page</title>
</head>
<body>
    <div class="Login">
        <form method="post" action="">
            <h1>Bem-vindo!</h1> 
            <label>
                Usuário:<br>
                <input type="text" name="txtusuario" />
                <br>
            </label>     
            <label>
                <br>
                Senha:<br>
                <input type="password" name="txtsenha" />
            </label>
            <br>
            <p>
                <input type="reset" name="txtLimpar" value="Limpar">
                <input type="submit" value="Entrar" name="btnEntrar">
            </p>
        </form>
     </div>
     <?php
        if(isset($_POST['btnEntrar'])){
            $usuario = isset($_POST["txtusuario"])? $_POST["txtusuario"] : null;
            $senha = isset($_POST["txtsenha"])?  $_POST["txtsenha"] : null;

            if($usuario && $senha){
                $_SESSION['usuario'] = $_POST['txtusuario'];
                $_SESSION['senha'] = $_POST['txtsenha'];

                $login = date("d-m-Y H:i:s");
                setcookie("Data_login", $login, time() + (36400 * 3));
                $_SESSION['Data_login'] = $login;

                header("Location: Verificação.php");
            }
            if ($usuario == null || $senha == null){
                $erro = 'É necessário inserir usuário e senha para acessar o conteúdo!';
                echo "<div class='aviso'>";
                echo $erro;
                echo "</div>";
            }
        }   
            
        ?>
</body>
</html>