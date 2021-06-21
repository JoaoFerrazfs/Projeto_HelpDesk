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
        <fieldset ><legend>Dados do Usuario</legend>
            <label style="margin-left: 100px;" for="nomeUsuario">Nome</label>
            <input type="text" name="nomeUsuario"  style="width: 50%;margin-left:20px"  >

            <label for="dataNascimento" >Data de Nascimento</label>
            <input type="date" name="dataUsuario" style="width: 15%; ">
                <br><br>
            <label for="emailUsuario" style="margin-left: 100px;" >E-mail</label>
            <input type="email" name="emailUsuario" style="width: 49%;margin-left:20px" >
    
            <label for="telefone Usuario">Telefone</label>
            <input type="tel"name="telefoneUsuario" placeholder="(00)0 0000 - 0000" style="width: 24%";>
                <br><br>
            <label for="setorUsuario" style="margin-left:25%"  >Setor</label>
            <input type=" text" name="setorUsuario" style="margin-left:3%">
    
            <label for="cargoUsuario"style="margin-left:10%" >Cargo</label>
            <input type="text" name="cargoUsuario" style="margin-left:20px">
        </fieldset>

        <fieldset style="margin-top: 30px;margin:5% 20% ; width:800px; " ><legend>Dados de Login</legend>

            <label for="loginUsuario">Usuario</label>
            <input type="text" name="loginUsuario"  style="width: 80%;margin-left:20px"  >
                <br>
            <label for="loginUsuario">Senha</label>
            <input type="text" name="senhaUsuario"  style="width: 80%;margin-left:20px"  >

        </fieldset>
                <div style="width: 50% ;margin:20px 350px ;" >
                    <button type="submit" name="cadastrarUsuario" style=" margin:10px 100px; width: 20%; height: 3%;" > Cadastrar Usuario </button>
                    <button type="submit" name="voltar" style=" margin:10px 100px; width: 20%; height: 3%;"> Voltar </button>
                </div>
            
</form>


</body>
</html>

<?php

if (isset($_POST['voltar'])){
    header('Location: index.php');
}

if (isset($_POST['cadastrarUsuario'])){

    $nome = $_POST['nomeUsuario'];
    $dataNasimento = $_POST['dataUsuario'];
    $email = $_POST['emailUsuario'];
    $telefone = $_POST['telefoneUsuario'];
    $setor = $_POST['setorUsuario'];
    $cargo = $_POST['cargoUsuario'];
    $usuario= $_POST['loginUsuario'];
    $senha= md5($_POST['senhaUsuario']);
    
    $query = mysqli_query($conexao,"INSERT INTO usuario (usuario,senha,nome,dataNascimento,email,telefone,setor,cargo) VALUES ('$usuario','$senha','$nome','$dataNasimento','$email','$telefone','$setor','$cargo')");
    if($query){
        echo 'Cadastro Realizado';
    }else{
        echo'Não foi possivel cadastrar';
    }
    
}



?>
