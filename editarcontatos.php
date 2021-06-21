<?php
include('verificar_login.php');
include('conexao.php');
?>

<html lang="pt-br">

<head>
    <title>Novo Chamado</title>
    <meta charset="utf-8">
    <meta name="author" content="João">
    <meta name="description" content="lista de documentos">
    <meta name="keywords" content="html5, tecnologia">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<?php

$id = $_GET['id'];
$query = "SELECT * FROM contatos where idcontatos='$id' ";
$resultados = mysqli_query($conexao, $query) or die("Erro ao tentar buscar registro");


if ($registro = mysqli_fetch_array($resultados)) {    
    $cargo = $registro['cargo'];
    $nome = $registro['nome'];
    $email = $registro['email'];
    $telefone = $registro['telefone'];
    $superior = $registro['superior'];
}


?>


<body style="margin-top:2% ; width: 1369px; margin-left:500px  ">

<h1 style="text-align: center;">Cadastro de Usuario<h1>

<form method="POST" style="font-size: 22px;margin-left:10px ; margin-top:10%  " >
        <fieldset ><legend>Dados do Contato</legend>

        <?php echo
            "<label style='margin-left: 100px;' for='cargo'>Cargo</label>
            <input type='text'name='cargo' value='$cargo'  style='width: 15%;margin-left:25px'  >

            <label for='nome' >Nome</label>
            <input type='text 'value='$nome' name='nome' style='width: 60%; '>
                <br><br>
            <label for='email' style='margin-left: 100px;' >E-mail</label>
            <input type='email' value='$email' name='email' style='width: 49%;margin-left:22px' >
    
            <label for='telefone'>Telefone</label>
            <input type='tel'  value='$telefone'   name='telefone' placeholder='(00)0 0000 - 0000' style='width: 24%';>
                <br><br>
                
            <label for='superior' style='margin-left: 100px'  >Superior</label>
            <input type='text' value='$superior' name='superior';>
            <input type='hidden' name='id' value='$id'>"
            
    
            ?>
        </fieldset>     
        
        <div style="width: 50% ;margin:20px 350px ;" >
                    <button type="submit" name="editarContato" style=" margin:10px 100px; width: 20%; height: 3%;" > Confirmar Edição </button>
                    
                    <button type="submit" name="voltar" style=" margin:10px 100px; width: 20%; height: 3%;"> Voltar </button>


                    <button type="submit" name="excluirContato" style=" margin:10px 270px; width: 20%; height: 3%;" > Excluir </button>
                </div>
            
</form>


</body>
</html>

<?php

if (isset($_POST['voltar'])){
    header('Location: listaContatos.php');
}

if (isset($_POST['editarContato'])){
    $id=$_POST['id'];
    $cargo = $_POST['cargo'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $superior = $_POST['superior'];
    
    
    $sql="UPDATE contatos set cargo='$cargo',nome='$nome',email='$email',telefone='$telefone',superior='$superior' WHERE idcontatos= $id ";

    if(mysqli_query($conexao, $sql)){
        echo "<h1 style='text-align:center'>Alterado com sucesso </h1>";
    } else
    echo"<h1 style='text-align:center'>O chamado não foi alterado </h1>";
    }
    
    if (isset($_POST['excluirContato'])){

        $id=$_POST['id'];

        $querydelete="DELETE from contatos WHERE idcontatos = $id";

        if(mysqli_query($conexao, $querydelete)){
            header('Location: listaContatos.php');
        } else
            echo"Não deletado";


    }




?>
