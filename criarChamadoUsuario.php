<?php
include('verificar_login.php');
include('conexao.php');
?>
<!DOCTYPE html>
<!--Doctype informa ao navegador a versão do html que deve ser renderizada-->
<html lang="pt-br">

<head>
    <title>Novo Chamado</title>
    <meta charset="utf-8">
    <meta name="author" content="João">
    <meta name="description" content="lista de documentos">
    <meta name="keywords" content="html5, tecnologia">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body id="corpoCriarChamadoAnalista">
    <!--Contruido sem cabeçalho-->

    <section class="formularioAtualizar">
        <!--Formulário de atualização de chamados-->

        <form method="POST">
            <!--Consolidação do botão submit-->

            <h1 style="text-align: center;font-size: 25px;">Novo Chamado</h1>

            <fieldset style="border-style: none;">
                <!--Formulário em si-->

                <div class="dadosIniciais">                                   
                            <label>Requisitante </label>
                            <input type="text" name="requisitante" id="criarequisitante" >
                </div> 

                        <div class="dadosSecundarios">
                           
                            <label>Data
                                <input type="text" name="dia" id="atualizardata">
                            </label> 

                            <label>Tarefa 
                                <select name="tarefa">
                                    <option>Incidente</option>
                                    <option>Requisição de Serviço</option>
                                    <option>Melhoria</option>
                                    <option>Problema</option>
                                </select>
                            </label>
     
                            <label>Resumo</label> <input type="text" name="resumo" id="criarresumo">  

                            <label>  Descrição 
                                <textarea name="descricao"> </textarea>
                            </label> 

                            </label> 

                        </div>

                        <div class="classificacoes"> 

                        <label>Prioridade 
                                <select name="prioridade">
                                    <option style="background-color:rgb(0,0,0);color: white;width: 150px;"  >Baixa</option>
                                    <option style="background-color:rgb(202, 202,3);color: white;width: 150px;"  >Média</option>
                                    <option style="background-color:red;color: white;width: 150px;"  >Alta</option>                                    
                                </select>
                            </label>
            </fieldset>

            <nav id="botoesAtualizar"> 

                <div class="imagens">
                <button  type="submit" name="salvarChamado">Salvar</button>                
                <button  type="submit" name="voltar">Voltar</button>          
               
                </div>

               
            </nav>
        </form>
    </section>


</body>

</html>

<?php
if (isset($_POST['voltar'])){
    header('Location: index.php');
}


if (isset($_POST['salvarChamado'])){

    $requisitante = $_POST['requisitante'];
    $dia = $_POST['dia'];
    $tarefa = $_POST['tarefa'];
    $descricao = $_POST['descricao'];
    $prioridade = $_POST['prioridade'];
    $status= 'Aberto';
    $resumo= $_POST['resumo'];

    $query = mysqli_query($conexao,"INSERT INTO chamados (requisitante,dia,tarefa,descricao,prioridade,status,resumo) VALUES ('$requisitante','$dia','$tarefa','$descricao','$prioridade','$status','$resumo')");
    if($query){
        echo 'Cadastro Realizado';
    }else{
        echo'Não foi possivel cadastrar';
    }
    
}

?>