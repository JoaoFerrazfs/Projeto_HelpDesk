<?php
include('verificar_login.php');
include('conexao.php');
?>


<?php




if (isset($_POST['filtrarResultados'])) {
    $flagFiltro = $_POST['statusFiltro'];
    $query = "SELECT * FROM chamados where status = '$flagFiltro'";
} else if (empty($_POST['filtrarResultados'])) {
    $query = "SELECT * FROM chamados  ";
}


$resultados = mysqli_query($conexao, $query) or die("Erro ao tentar buscar registro");

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


<body style="margin-left:500px ;width: 1365px;">

    <header>
        <!--Início do cabeçalho ( Local dos Principais Botoes )-->

        <nav class="principal">
            <h1> Chamados em Aberto</h1>
            <a href="./listaContatos.php">Lista de Contatos</a>
            <a href="./criarChamadoAnalista.php">Criar Chamado</a>
            <a href="./cadastroUsuario.php">Novo Usuario</a>

        </nav>

        <div class="botaoSair">


            <a php href="logout.php" style="text-decoration: none;"> <img class="sair" src="./imagem/sair.png" alt="Botão Sair"></a>
        </div>

        <nav class="perfilTotal">

            <div class="perfil">
                <img style="margin-left: 25px;" src="./imagem/icone.png" alt="Foto do Usuário">
                <p><?php echo $_SESSION['usuario']; ?></p>
                <a href="./login.php">Meu perfil</a>
            </div>
        </nav>
    </header>
    <!--Fim do cabeçalho ( Local dos Principais Botoes )-->


    <section id="listaChamados">
        <!-- Inicio da tabela e filtro de chamados-->


        <nav class="classificacao">
            <!-- Início dos filtros de chamados-->
            <Label>Classificar por:</Label>

            <form id="filtro" method="POST">

                <legend> Filtros </legend>

                <select name="statusFiltro" id="filtroStatus" >
                                    <option>Aberto</option>
                                    <option>Em Atendimento</option>
                                    <option>Fechado</option>
                                    
                                </select>


               
                <button type='submit' name='filtrarResultados' style=' margin: 10px 35px;'>Filtrar</button>
                <button type='submit' name='retirarFiltro' style=' margin: 10px 35px;'>Limpar Filtro</button>

            </form> <!-- Fim dos filtros de chamados-->

        </nav>

        <table class="tabchamados">

            <thead class="cabecalho">
                <tr>
                    <th>Nº</th>
                    <th>Dia</th>
                    <th>Tarefa</th>
                    <th>Resumo</th>
                    <th>Requisitante</th>
                    <th>Prioridade</th>
                    <th>Status</th>
                    <th>Função</th>
                    
                </tr>
            </thead>

            <?php
            $chamados = array();
            $i=0;


            while ($registro = mysqli_fetch_array($resultados)) {
                $i++;
                
                $numeroi = $registro['idchamados'];
                $diai = $registro['dia'];
                $tarefai = $registro['tarefa'];
                $resumoi = $registro['resumo'];
                $requisitantei = $registro['requisitante'];
                $prioridadei = $registro['prioridade'];
                $statusi = $registro['status'];
                $chamados[$i] = $numeroi;
                echo "<tr style='border-style: solid';>";
                echo "<td style='border-style: solid';>$numeroi</td>";
                echo "<td style='border-style: solid';>$diai</td>";
                echo "<td style='border-style: solid'; >$tarefai</td>";
                echo "<td style='border-style: solid'; >$resumoi</td>";
                echo "<td style='border-style: solid'; >$requisitantei</td>";
                echo "<td style='border-style: solid'; >$prioridadei</td>";
                echo "<td style='border-style: solid'; >$statusi</td>";
                echo "<td> <a href='atualizarchamado.php?id=$numeroi'> <button style='margin-left:25px;width: 120px;background: #069cc2; border-radius: 5px; padding: 10px; cursor: pointer; color: #fff; border: none; font-size: 16px;'>Exibir</button></a> </td>";
            
            }

                
            mysqli_close($conexao);
            
            ?>


        </table> <!-- Fim da tabela de chamados-->

    </section> <!-- Fim da tabela e filtro de chamados-->




</body>

</html>