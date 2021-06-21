<?php
session_start();
?>

<!DOCTYPE html>
<!--Doctype informa ao navegador a versão do html que deve ser renderizada-->
<html lang="pt-br">

<head>
    <title>HelpDesk</title>
    <meta charset="utf-8">
    <meta name="author" content="João">
    <meta name="description" content="lista de documentos">
    <meta name="keywords" content="html5, tecnologia">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body id="backgroudlogin" style= "margin:100px 650px"> <!--Início  do formulário de login-->
    

        <section class="formulario">            
            <img src="./imagem/icone.png" alt="Avatar">
             <form action="login.php" method="POST">
                <fieldset>

                        <?php
                           if(isset($_SESSION['nao_autenticado'])):
                         ?>       
                        <div class="notificacaoDeErro">
                            <p>Usuário ou senha inválidos</p>
                        </div>
                        <?php                        
                        endif;
                        unset($_SESSION['nao_autenticado']);
                        ?>

                        
                    <input type="text" name="usuario" id="loginusuario" placeholder="Usuario">
                    <input type="password" name="senha" id="loginsenha" placeholder="Senha">
                </fieldset>
                <a href="#">
                    Esqueceu sua senha?
                </a>

                   <button type="submit" id="enviarlogin">Entrar</button>


            </form>   

        </section>
        
        

</body><!--Fim do formulário de login-->


