<?php

    /*
        A página cadastro mostra um formulário para o cadastro dos médicos, que vai receber o nome,
        o CRM, o telefone, a especialidade e o endereço. Além de um botão para o envio do formulário
        e um para mostrar a lista com os médicos já cadastrados.
    */

    if(isset($_POST['submit'])){

        include_once('config.php');

        $nome = $_POST['nome'];
        $crm = $_POST['crm'];
        $telefone = $_POST['telefone'];
        $especialidades = $_POST['especialidades'];
        $endereco = $_POST['endereco'];

        $result = mysqli_query ($conexao, "INSERT INTO medicos(nome, crm, telefone, especialidades, endereco) VALUES ('$nome', '$crm', '$telefone', '$especialidades', '$endereco')");

        header('Location: listar.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

    <style>
        @charset "UTF-8";
        @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

        *{
            margin: 0px;
            padding: 0px;
            font-family: 'Inter', sans-serif;
            font-size: 16px;
        }

        body{
            background-color: #ECE8DD;
        }

        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #ffffff;
            border: 1px solid #146C94;
            padding: 15px;
            border-radius: 10px;
            width: 30%;
            color: #ffffff;
        }

        legend{
            border: 1px solid #A6BB8D;
            background-color: #146C94;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            color: #E1ECC8;
        }

        label{
            color: #000000;
        }

        .input-box{
            position: relative;
        }

        .input-user{
            background: none;
            border: none;
            border-bottom: 1px solid #146C94;
            outline: none;
            font-size: 15px;
            width: 100%;
        }

        .label-input{
            position: absolute;
            top: 0px;
            left: 0px;
        }

        #bt-submit{
            background-color: #146C94;
            width: 100%;
            border: none;
            padding: 15px;
            border-radius: 5px;
            color: #ffffff;
            font-size: 15px;
        }

        #bt-listar{
            background-color: #ECE8DD;
            color: #146C94;
            border: solid 1px #146C94;
            width: 100%;
            margin-top: 5px;
            padding: 15px;
            border-radius: 5px;

        }

        #bt-name{
            text-decoration: none;
            color: #146C94;
            font-size: 15px;
        }

        #bt-submit:hover{
            background-color: #146b94d5;
        }

    </style>
</head>
<body>
    <div class="box">
        <form action="cadastro.php" method="POST">
            <legend>Cadastro de médicos</legend>
            <br>
            <div class="input-box">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="input-user" placeholder="Digite o nome completo" required>
            </div>
            <br>
            <div class="input-box">
                <label for="crm">Número do CRM:</label>
                <input type="text" name="crm" id="crm" class="input-user" placeholder="Digite o CRM" required>
            </div>
            <br>
            <div class="input-box">
                <label for="telefone">Telefone:</label>
                <input type="tel" name="telefone" id="telefone" class="input-user" placeholder="xxxxx-xxxx">
            </div>
            <br>
            <div class="input-box">
                <label for="especialidades">Especialidades:</label>
                <input type="text" name="especialidades" id="especialidades" class="input-user" placeholder="Ex: Cardiologia" required>
            </div>
            <br>
            <div class="input-box">
                <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" id="endereco" class="input-user" placeholder="Ex: Av. João Pessoa, 55">
            </div>
            <br>
            <input type="submit" name="submit" id="bt-submit">

            <button id="bt-listar"><a id="bt-name" href="listar.php">Listar médicos</a></button>

        </form>
    </div>
</body>
</html>