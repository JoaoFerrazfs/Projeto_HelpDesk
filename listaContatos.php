<?php
include('verificar_login.php');
include('conexao.php');
?>


<!DOCTYPE html>
<!--Doctype informa ao navegador a versão do html que deve ser renderizada-->
<html lang="pt-br">

<head>
    <title>Lista de Chamados </title>
    <meta charset="utf-8">
    <meta name="author" content="João">
    <meta name="description" content="lista de documentos">
    <meta name="keywords" content="html5, tecnologia">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body style="margin-left:600px ;width: 1360px;">

    <header>
        <nav class="principal">
            <h1> Chamados em Aberto</h1>
            <a href="./index.php">Pagina Inicial</a>
            <a href="./novoContato.php">Novo Contato</a>

        </nav>

        <div class="botaoSair">
            <a href="../HelpDesk/login.php" style="text-decoration: none;"> <img class="sair" src="./imagem/sair.png" alt="Botão Sair"></a>
        </div>

        <nav class="perfilTotal">
            <div class="perfil">
                <img src="./imagem/usuario.jpg" alt="Foto do Usuário">
                <p><?php echo $_SESSION['usuario']; ?></p>
                <a href="./login.php">Meu perfil</a>
            </div>
        </nav>
    </header>



    <section id="listaChamados">
        <table class="tabchamados" style="margin-left: 200px; width: 50px;">
            <thead class="cabecalho">
                <tr>
                    <th>Cargo</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Superior</th>
                    <th>Funções</th>
                </tr>
            </thead>
            <tbody class="corpo">

                <?php

                $query = "SELECT * FROM contatos";
                $resultados = mysqli_query($conexao, $query) or die("Erro ao tentar buscar registro");

                while ($registro = mysqli_fetch_array($resultados)) {
                    $idcontatos = $registro['idcontatos'];
                    $cargo = $registro['cargo'];
                    $nome = $registro['nome'];
                    $email = $registro['email'];
                    $telefone = $registro['telefone'];
                    $superior = $registro['superior'];

                    echo "
                    
                            <tr style='border-style: solid';>
                            <td style='border-style: solid';>$cargo</td>  
                            <td style='border-style: solid';>$nome</td>  
                            <td style='border-style: solid'; >$email</td>
                            <td style='border-style: solid'; >$telefone</td>
                            <td style='border-style: solid'; >$superior</td>
                            <td> <a href='editarContatos.php?id=$idcontatos'> <button style='margin-left:25px;width: 120px;background: #069cc2; border-radius: 5px; padding: 10px; cursor: pointer; color: #fff; border: none; font-size: 16px;'>Editar</button> </a>

                            


                            </tr>
                         ";
                }


               
                mysqli_close($conexao);
                ?>
            </tbody>


        </table>

    </section>



</body>

</html>