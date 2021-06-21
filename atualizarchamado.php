<?php
include('verificar_login.php');
include('conexao.php');
?>
<!DOCTYPE html>
<!--Doctype informa ao navegador a versão do html que deve ser renderizada-->
<html lang="pt-br">

<head>
    <title>Visualizar Chamado</title>
    <meta charset="utf-8">
    <meta name="author" content="João">
    <meta name="description" content="lista de documentos">
    <meta name="keywords" content="html5, tecnologia">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<?php


$id = $_GET['id'];
$query = "SELECT * FROM chamados where idchamados='$id' ";
$resultados = mysqli_query($conexao, $query) or die("Erro ao tentar buscar registro");

if ($registro = mysqli_fetch_array($resultados)) {

    $numeroV = $registro['idchamados'];
    $diaV = $registro['dia'];
    $tarefaV = $registro['tarefa'];
    $resumoV = $registro['resumo'];
    $requisitanteV = $registro['requisitante'];
    $prioridadeV = $registro['prioridade'];
    $statusV = $registro['status'];
    $descricaoV = $registro['descricao'];
    $idchamadoV = $registro['idchamados'];
}





?>

<body id="corpoAtualizar" style="margin-left:800px ;width: 900px; height:500px;">
    <!--Contruido sem cabeçalho-->

    <section class="formularioAtualizar">


        <form method="POST">


            <?php echo "<p style=color:black >Chamado  $idchamadoV </p>"; ?>

            <fieldset style="border-style: none;">


                <div class="dadosIniciais">



                    <?php
                    echo " <label>Requisitante</label>
                           <input type='text' name='atualizarRequisitante' id='atualizarRequisitante' value='$requisitanteV' readonly=“true” style='margin-left:10px;'> </label>
                           <label style='margin-left:25px;' >Data</label> 
                           <input type='datetime' name='atualizardata' id='atualizardata' value='$diaV' readonly=“true” style='width:90px;margin-left:25px;'>
                           <br><br>
                       

                           <label>Tarefa 
                           <select name='tarefa' style='width:85%;margin-left:43px';>
                             <option >$tarefaV</option>
                             <option >Incidente</option>
                             <option>Requisição de Serviço</option>
                             <option>Melhoria</option>
                             <option>Problema</option>                               
                           </select>
                           </label>
                           
                           <br>
                           <label>Prioridade 
                           <select name='prioridade' style='width:35%;margin-left:20px';>
                             <option >$prioridadeV</option>
                             <option >Baixa</option>
                             <option>Média</option>
                             <option>Alta</option>                                   
                           </select>
                           </label>
 
                           <label style='margin-left:34px'>Status 
                           <select name='status'margin-left:43px';>
                             <option >$statusV</option>
                             <option >Aberto</option>
                             <option>Em Atendimento</option>
                             <option>Fechado</option>                                   
                           </select>

                           </label> <br>
                           
                           <label>Resumo</label> 
                           <input type='datetime' name='resumo' id='atualizardata' value='$resumoV' readonly=“true” style='width: 84%;margin-left:30px'>
                           <br> <br> 



                           <label>Descrição</label>
                           <br><br>
                           <textarea style= 'width:95%'; readonly=“true”' name='descricao'>$descricaoV</textarea>
                           <br> <br>

                           <label>Comentários</label>
                          <br> <br>
                          
                          <input type='hidden' name='id' value='$idchamadoV'>

                           "
                    ?>

                </div>

            </fieldset>

            <nav id="botoesAtualizar">
                <button type="submit" name="atualizarChamado">Salvar</button>
                <button  type="submit" name="voltar">Voltar</button> 
            </nav>
        </form>

    </section>


</body>

</html>

<?php

if (isset($_POST['voltar'])){
    header('Location: index.php');
}

    
if (isset($_POST['atualizarChamado'])) {
    $id = $_POST['id'];
    $requisitante =$_POST['atualizarRequisitante'];
    $data= $_POST['atualizardata'];
    $resumo=$_POST['resumo'];
    $descricao=$_POST['descricao'];
    $tarefa = $_POST['tarefa'];
    $prioridade = $_POST['prioridade'];
    $status = $_POST['status'];

  
    $sql= "UPDATE `chamados` SET `tarefa` = '$tarefa',`prioridade` = '$prioridade',`status` = '$status' WHERE idchamados = $id";
    
    if(mysqli_query($conexao, $sql)){
        echo "<h1 style='text-align:center'>Alterado com sucesso </h1>";
    } else
    
        echo"<h1 style='text-align:center'>O chamado não foi alterado </h1>";
        
   
}

mysqli_close($conexao);

?>