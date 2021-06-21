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

<body style="margin-top:2% ; width: 1369px; margin-left:500px  ">

<h1 style="text-align: center;">Cadastro de Usuario<h1>

<form method="POST" style="font-size: 22px;margin-left:10px ; margin-top:10%  " >
        <fieldset ><legend>Dados do Contato</legend>
            <label style="margin-left: 100px;" for="cargo">Cargo</label>
            <input  type="text" name="cargo"  style="width: 15%;margin-left:25px"  >

            <label for="nome" >Nome</label>
            <input type="text" name="nome" style="width: 60%; ">
                <br><br>
            <label for="email" style="margin-left: 100px;" >E-mail</label>
            <input type="email" name="email" style="width: 49%;margin-left:22px" >
    
            <label for="telefone">Telefone</label>
            <input type="tel"name="telefone" placeholder="(00)0 0000 - 0000" style="width: 24%";>
                <br><br>
            <label for="superior" style="margin-left: 100px"  >Superior</label>
            <input type=" text" name="superior" style="margin-left:5px">
    
            
        </fieldset>     
        
        <div style="width: 50% ;margin:20px 350px ;" >
                    <button type="submit" name="cadastrarContato" style=" margin:10px 100px; width: 20%; height: 3%;" > Cadastrar Usuario </button>
                    <button type="submit" name="voltar" style=" margin:10px 100px; width: 20%; height: 3%;"> Voltar </button>
                </div>
            
</form>


</body>
</html>

<?php

if (isset($_POST['voltar'])){
    header('Location: index.php');
}

if (isset($_POST['cadastrarContato'])){

    $cargo = $_POST['cargo'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $superior = $_POST['superior'];
    
    
    $query = mysqli_query($conexao,"INSERT INTO contatos (cargo,nome,email,telefone,superior) VALUES ('$cargo','$nome','$email','$telefone','$superior')");
    if($query){
        echo 'Cadastro Realizado';
    }else{
        echo'Não foi possivel cadastrar';
    }
    
}



?>
