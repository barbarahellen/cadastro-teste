<?php

    /*
        A página editar mostra um formulário com os dados do médico já cadastrado
        para ser feita a edição desejada. Além do botão de enviar e um de voltar para
        a lista.
    */
    
    if(!empty($_GET['idmedicos'])){

        include_once('config.php');

        $idmedicos = $_GET['idmedicos'];
        $sqlSelect = "SELECT * FROM medicos WHERE idmedicos = $idmedicos";
        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){
            while($user_data = mysqli_fetch_assoc($result)){
                $nome = $user_data['nome'];
                $crm = $user_data['crm'];
                $telefone = $user_data['telefone'];
                $especialidades = $user_data['especialidades'];
                $endereco = $user_data['endereco'];
            }

        } else{
            header('Location: listar.php');
        }
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

        label{
            color: #146C94;
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

        #bt-voltar{
            width: auto;
            padding: 10px;
            background-color: #146C94;
            border-radius: 10px;
            border: 1px solid #ECE8DD;
        }

    </style>
</head>
<body>


    <div class="box">
        <form action="salvarEdit.php" method="POST">
            <legend>Editar médico</legend>
            <br>
            <div class="input-box">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="input-user" required value=<?php echo $nome;?>>
            </div>
            <br>
            <div class="input-box">
                <label for="crm">Número do CRM:</label>
                <input type="text" name="crm" id="crm" class="input-user" required value=<?php echo $crm;?>>
            </div>
            <br>
            <div class="input-box">
                <label for="telefone">Telefone:</label>
                <input type="tel" name="telefone" id="telefone" class="input-user" required value=<?php echo $telefone;?>>
            </div>
            <br>
            <div class="input-box">
                <label for="especialidades">Especialidades:</label>
                <input type="text" name="especialidades" id="especialidades" class="input-user" required value=<?php echo $especialidades;?>>
            </div>
            <br>
            <div class="input-box">
                <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" id="endereco" class="input-user" required value=<?php echo $endereco;?>>
            </div>
            <br>
            <input type="hidden" name="idmedicos" value=<?php echo $idmedicos;?>>
            <input type="submit" name="update" id="bt-submit" >


            <button id="bt-listar"><a id="bt-name" href="listar.php">Voltar</a></button>
        </form>
    </div>
</body>
</html>